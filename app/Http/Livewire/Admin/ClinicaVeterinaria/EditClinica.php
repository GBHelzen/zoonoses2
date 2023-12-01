<?php

namespace App\Http\Livewire\Admin\ClinicaVeterinaria;

use App\Models\ClinicaVeterinaria;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditClinica extends Component
{
    public ClinicaVeterinaria $clinica;
    public Endereco $endereco;


    function rules()
    {
        return [
            'clinica.nome' => ['required'],
            'clinica.telefone' => ['required'],

            'endereco.endereco' => ['required'],
            'endereco.complemento' => ['nullable'],
            'endereco.numero' => ['required'],
            'endereco.bairro' => ['required'],
            'endereco.cidade' => ['required'],
            'endereco.cep' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $this->clinica->save();
            $this->endereco->save();
            $this->clinica->endereco_id = $this->endereco->id;
        });

        session()->flash('success', 'Clínica ' . $this->clinica->nome . ' editada com sucesso !');

        return redirect()->route('clinicas.index');
    }


    public function buscaCep()
    {
        $response = Http::get('https://viacep.com.br/ws/' . $this->endereco->cep . '/json/');

        $data = $response->json();

        if ($data) {
            $this->endereco->cep = $data['cep'];
            $this->endereco->endereco = $data['logradouro'];
            $this->endereco->bairro = $data['bairro'];
            $this->endereco->cidade = $data['localidade'];
            $this->endereco->complemento = $data['complemento'];
        }

        if (!$data) {
            session()->flash('error', 'Ops! Nenhum endereço encontrado!');
        }
    }

    public function mount(ClinicaVeterinaria $clinica)
    {
        $this->clinica = $clinica;

        $this->endereco = $clinica->endereco;
    }
    public function render()
    {
        return view('admin.clinica-veterinaria.edit-clinica')->layout('layouts.admin');
    }
}
