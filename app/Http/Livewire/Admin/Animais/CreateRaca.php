<?php

namespace App\Http\Livewire\Admin\Animais;

use App\Models\Endereco;
use App\Models\Especie;
use App\Models\Raca;
use Livewire\Component;

class CreateRaca extends Component
{
    public Raca $raca;
    public $especies, $especie_id, $nome;

    function rules()
    {
        return [
            'raca.nome' => ['required', 'string','unique:racas,nome,'.$this->raca->especie_id,],
            // 'raca.nome' => ['required', 'string', 'unique:nome],
            'raca.especie_id' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        $this->raca->save();

        session()->flash('success', 'Raça ' . $this->raca->nome . ' cadastrada com sucesso!');

        return redirect()->route('racas.index');
    }

    public function mount()
    {
        $this->raca = new Raca();
        $this->especies = Especie::orderBy('nome')->get();
    }


    public function render()
    {
        return view('admin.animais.racas.create-raca')->layout('layouts.admin');
    }
}
