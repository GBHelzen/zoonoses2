<?php

namespace App\Http\Livewire\Ong;

use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\PessoaJuridica;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PerfilResponsavel extends Component
{
    public PessoaJuridica $ong;

    public User $user;

    public Pessoa $pessoa;

    public Endereco $endereco;


    function rules()
    {
        return [
            'user.name' => ['required'],
            'user.email' => 'required|string|email|max:255|unique:users,email,' . $this->user->email . ',email',
            // 'user.cpf' => ['required', 'string', 'max:255', new CPF(), 'unique:users,cpf,' . $this->user->cpf . ',cpf'],

            'pessoa.rg_uf' => ['required'],
            'pessoa.rg' => ['required'],
            'pessoa.nascimento' => 'required|before:'.Carbon::now()->subYears(18),
            'pessoa.telefone' => ['required'],
            'pessoa.telefone_secundario' => ['nullable'],

            'endereco.cep' => ['required', 'string'],
            'endereco.endereco' => ['required', 'string'],
            'endereco.bairro' => ['required', 'string'],
            'endereco.numero' => ['required', 'string'],
            'endereco.cidade' => ['required', 'string'],
            'endereco.complemento' => ['nullable', 'string'],

        ];
    }

    public function mount(PessoaJuridica $ong, User $user)
    {
        $this->ong = $ong;

        $this->user = $user;

        $this->pessoa = $user->pessoa;

        $this->endereco = $this->pessoa->endereco ?? new Endereco();
    }

    public function buscaCep()
    {
        $response = Http::get('https://viacep.com.br/ws/' . $this->endereco->cep . '/json/');

        $data = $response->json();
        // dd($data);
        if ($data) {
            $this->endereco->cep = $data['cep'];
            $this->endereco->endereco = $data['logradouro'];
            $this->endereco->bairro = $data['bairro'];
            // $this->endereco->numero = $data['numero'];
            $this->endereco->cidade = $data['localidade'];
            $this->endereco->complemento = $data['complemento'];
        }

        if (!$data) {
            session()->flash('error', 'Ops! Nenhum endereço encontrado!');
        }
    }

    public function store()
    {
        $this->validate();

        $this->user->save();

        $this->pessoa->finalizou_cadastro_pessoa = true;

        $this->pessoa->save();

        $endereco = Endereco::updateOrCreate(
            [
                'cep' => $this->endereco->cep,
                'numero' => $this->endereco->numero,
            ],
            [
                'cep' => $this->endereco->cep,
                'endereco' => $this->endereco->endereco,
                'bairro' => $this->endereco->bairro,
                'cidade' => $this->endereco->cidade,
                'complemento' => $this->endereco->complemento,
                'numero' => $this->endereco->numero,
            ]
        );

        $this->pessoa->endereco_id = $endereco->id;

        $this->pessoa->save();

        $this->emit('saved');

        return redirect()->back()->with('success', 'Dados atualizados com succeso !');
    }

    public function render()
    {
        return view('ong.responsavel.perfil')->layout('layouts.ong');
    }
}
