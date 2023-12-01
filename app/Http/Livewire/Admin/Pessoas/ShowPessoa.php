<?php

namespace App\Http\Livewire\Admin\Pessoas;

use App\Models\DadosSocioEconomico;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\User;
use App\Rules\CPF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShowPessoa extends Component
{
    public Pessoa $pessoa;
    public User $user;
    public Endereco $endereco;

    public function rules()
    {
        return [
            'user.name' => ['required'],
            'user.email' => 'required|string|email|max:255|unique:users,email,' . $this->user->email . ',email',
            'user.cpf' => ['required', 'string', 'max:255', new CPF(), 'unique:users,cpf,' . $this->user->cpf . ',cpf'],

            'pessoa.rg_uf' => ['required'],
            'pessoa.numero_cad_unico' => ['nullable'],
            'pessoa.rg' => ['required'],
            'pessoa.nascimento' => 'required|before:'.Carbon::now()->subYears(18),
            'pessoa.telefone' => ['required'],
            'pessoa.telefone_secundario' => ['nullable'],

            'endereco.endereco' => ['required'],
            'endereco.complemento' => ['nullable'],
            'endereco.numero' => ['required'],
            'endereco.bairro' => ['required'],
            'endereco.cidade' => ['required'],
            'endereco.cep' => ['required'],
        ];
    }


    public function mount(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;

        $this->user = $pessoa->user;

        $this->endereco = $pessoa->endereco ?? new Endereco();
    }

    public function buscaCep()
    {
        $response = Http::get('https://viacep.com.br/ws/' . $this->endereco->cep . '/json/');

        $data = $response->json();

        if ($data) {
            $this->endereco->cep = $data['cep'];
            $this->endereco->endereco = $data['logradouro'];
            $this->endereco->bairro = $data['bairro'];
            // $this->numero = $data['numero'];
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

        DB::transaction(function () {
            $this->pessoa->save();
            $this->user->save();
        });

        session()->flash('success', 'Dados do pessoa ' . $this->pessoa->user->name . ' foram atualizados com sucesso !');

        // return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('admin.pessoas.show-pessoa')->layout('layouts.admin');
    }
}
