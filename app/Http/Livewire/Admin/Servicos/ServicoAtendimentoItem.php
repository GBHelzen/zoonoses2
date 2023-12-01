<?php

namespace App\Http\Livewire\Admin\Servicos;

use App\Models\Servico;
use Livewire\Component;

class ServicoAtendimentoItem extends Component
{
    public Servico $servico;

    public $openModal = false;

    public function mount(Servico $servico)
    {
        $this->servico = $servico;
    }

    public function closeModal()
    {
        $this->openModal = false;
    }
    
    public function openModal()
    {
        $this->openModal = true;
    }

    public function render()
    {
        return view('livewire.admin.servico-atendimento-item');
    }
}
