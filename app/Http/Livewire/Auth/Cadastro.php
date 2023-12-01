<?php

namespace App\Http\Livewire\Auth;

use App\Rules\CPF;
use Livewire\Component;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\Captcha;
use App\Rules\CNPJ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Cadastro extends Component
{

    public $name, $cpf, $cnpj, $razao_social, $email, $password, $password_confirmation;

    public $captcha = 0;

    public $tipo_pessoa = 1;

    function rules()
    {
        return  [
            'name' => 'required|string|max:255',
            'cpf' =>  ['unique:users', 'required', 'string', 'max:255', new CPF()],
            'cnpj' =>  $this->tipo_pessoa == 0 ? ['required', 'string', 'max:255', new CNPJ(), 'unique:pessoa_juridicas,cnpj'] : ['nullable'],
            'razao_social' =>  !$this->tipo_pessoa ? ['required', 'string', 'max:255', 'unique:pessoa_juridicas'] : ['nullable'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'tipo_pessoa' => 'required|boolean',
            // 'g_recaptcha_response' => new Captcha()

        ];
    }

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
        // dd($response->json());
        $this->captcha = $response->json()['score'];
        if (!$this->captcha > .3) {
            $this->submit();
        } else {
            return session()->flash('error', 'Google acha que você é um robô, por favor recarregue a página e tente novamente');
        }
    }

    public function store(Request $request)
    {
        $this->validate();

        // transação para realizar rollback e garantir integridade dos dados
        DB::transaction(function () {

            if(!Auth::user()){
                Auth::login($user = User::create([
                    'name' => $this->name,
                    'cpf' => $this->cpf,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]));
            }else{

                $user = User::create([
                    'name' => $this->name,
                    'cpf' => $this->cpf,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);

            }


            // verificar se é pessoa física ou jurídica
            if ($this->tipo_pessoa == true) {
                return $this->storePessoaFisica($user);
            } else {
                return $this->storePessoaJuridica($user);
            }
        });
    }

    public function storePessoaFisica(User $user)
    {

        $user->pessoa()->create(['email' => $this->email]);

        if(Auth::user()->roles->count() > 0){
            return redirect('/admin/pessoas');
        }

        return redirect(RouteServiceProvider::HOME);
    }

    public function storePessoaJuridica(User $user)
    {
        $pessoa = $user->pessoa()->create(['email' => $this->email]);

        $pessoa->ong()->create(['cnpj' => $this->cnpj, 'razao_social' => $this->razao_social]);

        $user->assignRole('ong-admin');

        if(Auth::user()->roles->count() > 0){
            return redirect('/admin/pessoas');
        }

        return redirect()->route('ong.dashboard');
    }

    public function render()
    {
        return view('auth.cadastro')->layout('layouts.guest');
    }
}
