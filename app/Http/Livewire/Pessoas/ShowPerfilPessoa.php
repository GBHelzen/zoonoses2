<?php

namespace App\Http\Livewire\Pessoas;

use App\Models\Pessoa;
use Livewire\Component;

class ShowPerfilPessoa extends Component
{
    public $pessoa;


    public function mount(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }
    public function render()
    {
        return view('pessoas.show-perfil-pessoa')->layout('layouts.admin');
    }
}
