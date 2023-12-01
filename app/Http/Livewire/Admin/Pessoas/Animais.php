<?php

namespace App\Http\Livewire\Admin\Pessoas;

use App\Models\Pessoa;
use Livewire\Component;

class Animais extends Component
{
    public Pessoa $pessoa;

    public function mount(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function render()
    {
        return view(
            'admin.pessoas.animais',
            [
                'animais' => $this->pessoa->animais
            ]
        );
    }
}
