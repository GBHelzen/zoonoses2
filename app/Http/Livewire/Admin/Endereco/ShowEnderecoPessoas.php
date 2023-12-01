<?php

namespace App\Http\Livewire\Admin\Endereco;

use App\Models\Endereco;
use Livewire\Component;

class ShowEnderecoPessoas extends Component
{

    public Endereco $endereco;

    public function mount(Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    public function render()
    {
        return view(
            'admin.endereco.show-endereco-pessoas',
            [
                'pessoas' => $this->endereco->pessoas
            ]
        )->layout('layouts.admin');
    }
}
