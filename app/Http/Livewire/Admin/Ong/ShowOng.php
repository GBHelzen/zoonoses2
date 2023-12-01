<?php

namespace App\Http\Livewire\Admin\Ong;

use App\Models\Endereco;
use App\Models\PessoaJuridica;
use App\Rules\CNPJ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShowOng extends Component
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

        $this->endereco = $ong->endereco ?? new Endereco();
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

        DB::transaction(function () {
            $this->ong->save();
            $this->endereco->save();
        });

        session()->flash('success', 'Dados da ONG ' . $this->ong->razao_social . ' foram atualizados com sucesso !');

        $this->emit('saved');
    }

    public function render()
    {
        return view('admin.ong.show-ong')->layout('layouts.admin');
    }
}
