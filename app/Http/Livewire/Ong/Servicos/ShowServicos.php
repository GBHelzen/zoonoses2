<?php

namespace App\Http\Livewire\Ong\Servicos;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowServicos extends Component
{
    protected $listeners = ['servicoStored' => 'render'];

    public function render()
    {
        return view(
            'ong.servicos.show-servicos',
            [
                'servicos' => Auth::user()->pessoa->ong->servicos()->paginate()
            ]
        );
    }
}
