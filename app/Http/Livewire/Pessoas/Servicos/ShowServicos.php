<?php

namespace App\Http\Livewire\Pessoas\Servicos;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowServicos extends Component
{

    protected $listeners = ['servicoStored' => 'render'];


    public function render()
    {
        return view('pessoas.servicos.show-servicos',
    [
        'servicos' => Auth::user()->pessoa->servicos()->paginate()
    ]);
    }
}
