<?php

namespace App\Http\Livewire\Pessoas;

use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\User;
use App\Rules\CPF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PerfilPessoa extends Component
{

    public User $user;

    public Pessoa $pessoa;

    public $endereco;
    public $cep;
    public $numero;
    public $bairro;
    public $cidade;
    public $complemento;




    function rules()
    {
        return [
            'user.name' => ['required'],
            'user.email' => 'required|string|email|max:255|unique:users,email,' . $this->user->email . ',email',
            'user.cpf' => ['required', 'string', 'max:255', new CPF(), 'unique:users,cpf,' . $this->user->id],
            // 'user.cpf' => ['required', 'string', 'max:255', new CPF(), 'unique:users,cpf,' . $this->user->cpf . ',cpf'],

            'pessoa.rg_uf' => ['required'],
            'pessoa.rg' => ['required'],
            'pessoa.nascimento' => 'required|before:'.Carbon::now()->subYears(18),
            'pessoa.telefone' => ['required'],
            'pessoa.telefone_secundario' => ['nullable'],
            'pessoa.numero_cad_unico' => ['nullable'],
            'endereco' => ['required'],
            'complemento' => ['nullable'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'cep' => ['required'],
        ];
    }


    public function buscaCep()
    {
        $response = Http::get('https://viacep.com.br/ws/' . $this->cep . '/json/');

        $data = $response->json();

        if ($data) {
            $this->cep = $data['cep'];
            $this->endereco = $data['logradouro'];
            $this->bairro = $data['bairro'];
            // $this->numero = $data['numero'];
            $this->cidade = $data['localidade'];
            $this->complemento = $data['complemento'];
        }

        if (!$data) {
            session()->flash('error', 'Ops! Nenhum endereço encontrado!');
        }
    }

    public function mount()
    {
        $this->user = Auth::user();

        $this->pessoa = Auth::user()->pessoa;

        $endereco = Auth::user()->pessoa->endereco;

        if ($endereco) {
            $this->cep = $endereco->cep;
            $this->endereco = $endereco->endereco;
            $this->bairro = $endereco->bairro;
            $this->numero = $endereco->numero;
            $this->cidade = $endereco->cidade;
            $this->complemento = $endereco->complemento;
        }
    }

    public function store()
    {
        $this->validate();

        $this->user->save();

        $this->pessoa->finalizou_cadastro_pessoa = true;

        $endereco = Endereco::updateOrCreate(
            [
                'cep' => $this->cep,
                'numero' => $this->numero,
            ],
            [
                'cep' => $this->cep,
                'endereco' => $this->endereco,
                'bairro' => $this->bairro,
                'cidade' => $this->cidade,
                'complemento' => $this->complemento,
                'numero' => $this->numero,
            ]
        );

        $this->pessoa->endereco_id = $endereco->id;

        $this->pessoa->save();

        // $this->pessoa->endereco->save();

        $this->emit('saved');

        return redirect()->back()->with('success', 'Dados atualizados com succeso !');
    }

    public function render()
    {
        return view('pessoas.perfil-pessoa');
    }
}
