<?php

namespace App\Http\Livewire\Admin\Ong;

use App\Models\PessoaJuridica;
use Livewire\Component;

class Servicos extends Component
{

    public PessoaJuridica $ong;

    public function mount(PessoaJuridica $ong)
    {
        $this->ong = $ong;
    }

    public function render()
    {
        return view(
            'admin.ong.servicos',
            [
                'servicos' => $this->ong->servicos
            ]
        );
    }
}
