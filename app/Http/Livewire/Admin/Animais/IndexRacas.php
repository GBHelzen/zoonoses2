<?php

namespace App\Http\Livewire\Admin\Animais;

use App\Models\Raca;
use Livewire\Component;

class IndexRacas extends Component
{
    public $deleteModal  = false;

    public $raca = null;
    public $search = '';

    public function openModal(Raca $raca)
    {
        $this->raca = $raca;

        $this->deleteModal = true;
    }

    public function destroy(Raca $raca)
    {
        $raca->delete();

        session()->flash('success', 'Raça' . $raca->nome . ' deletada com sucesso !');

        $this->deleteModal = false;
    }

    public function render()
    {
        return view(
            'admin.animais.racas.index',
            [
                'racas' => Raca::where('nome', 'ilike', '%' . $this->search .  '%')
                    ->orderBy('especie_id', 'asc')->paginate(10),
            ]
        )->layout('layouts.admin');
    }
}
