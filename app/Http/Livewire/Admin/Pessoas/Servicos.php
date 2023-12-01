<?php

namespace App\Http\Livewire\Admin\Pessoas;

use App\Models\Pessoa;
use Livewire\Component;

class Servicos extends Component
{

    public Pessoa $pessoa;

    public function mount(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function render()
    {
        return view(
            'admin.pessoas.servicos',
            [
                'servicos' => $this->pessoa->servicos
            ]
        );
    }
}
