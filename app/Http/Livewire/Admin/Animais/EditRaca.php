<?php

namespace App\Http\Livewire\Admin\Animais;

use App\Models\Endereco;
use App\Models\Especie;
use App\Models\Raca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditRaca extends Component
{
    public Raca $raca;
    public $especies, $especie_id, $nome;


    function rules()
    {
        return [
            'raca.nome' => ['required', 'string','unique:racas,nome,'.$this->raca->especie_id,],
            'raca.especie_id' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $this->raca->save();
            // $this->raca->especie_id = $this->especie_id;
        });

        session()->flash('success', 'Raça ' . $this->raca->nome . ' editada com sucesso !');

        return redirect()->route('racas.index');
    }

    public function mount(Raca $raca)
    {
        $this->raca = $raca;

        $this->especies = Especie::orderBy('nome')->get();
    }

    public function render()
    {
        return view('admin.animais.racas.edit-raca')->layout('layouts.admin');
    }
}
