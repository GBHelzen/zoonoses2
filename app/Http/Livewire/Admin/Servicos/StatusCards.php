<?php

namespace App\Http\Livewire\Admin\Servicos;

use App\Models\Servico;
use Livewire\Component;

class StatusCards extends Component
{

    protected $listeners = [
        'servicoStored' => 'render',
        'servicoUpdated' => 'render'
    ];

    public function render()
    {
        return view(
            'admin.servicos.status-cards',
            [
                'total' => Servico::all()->count(),
                'agendado' => Servico::where('status', Servico::AGENDADO)->count(),
                'aguardando' => Servico::where('status', Servico::AGUARDANDO)->count(),
                'para_castracao' => Servico::where('status', Servico::PARA_CASTRACAO)->count(),
                'cancelado' => Servico::where('status', Servico::CANCELADO)->count(),
                'confirmado' => Servico::where('status', Servico::CONFIRMADO)->count(),
            ]
        );
    }
}
