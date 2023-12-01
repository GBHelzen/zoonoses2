<?php

namespace App\Http\Livewire\Ong;

use App\Models\Endereco;
use App\Models\PessoaJuridica;
use App\Rules\CNPJ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Perfil extends Component
{
    public PessoaJuridica $ong;
    public Endereco $endereco;

    public function rules()
    {
        return [
            'ong.razao_social' => ['required', 'string', 'unique:pessoa_juridicas,razao_social,' . $this->ong->razao_social . ',razao_social'],
            'ong.descricao' => ['nullable', 'string',],
            'ong.telefone' => ['required', 'string',],
            'ong.nome_fantasia' => ['required', 'string', 'unique:pessoa_juridicas,nome_fantasia,' . $this->ong->nome_fantasia . ',nome_fantasia'],
            'ong.email' => ['required', 'email',],
            'ong.cnpj' => ['required', 'string', 'max:255', new CNPJ(), 'unique:pessoa_juridicas,cnpj,' . $this->ong->cnpj . ',cnpj'],

            'endereco.cep' => ['required', 'string'],
            'endereco.endereco' => ['required', 'string'],
            'endereco.bairro' => ['required', 'string'],
            'endereco.numero' => ['required', 'string'],
            'endereco.cidade' => ['required', 'string'],
            'endereco.complemento' => ['nullable', 'string'],

        ];
    }

    public function mount(PessoaJuridica $ong)
    {
        $this->ong = $ong;

        $this->endereco = Auth::user()->pessoa->ong->endereco ?? new Endereco();
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

        $this->ong->finalizou_cadastro_pessoa = true;

        $this->ong->save();

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
        
        $this->ong->endereco_id = $endereco->id;

        $this->ong->save();

        $this->emit('saved');

        session()->flash('success', 'Perfil salvo com sucesso !');

    }

    public function render()
    {
        return view('ong.perfil')->layout('layouts.ong');
    }
}
