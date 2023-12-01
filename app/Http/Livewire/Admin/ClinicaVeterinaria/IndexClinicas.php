<?php

namespace App\Http\Livewire\Admin\ClinicaVeterinaria;

use App\Models\ClinicaVeterinaria;
use Livewire\Component;

class IndexClinicas extends Component
{
    public $deleteModal  = false;

    public $clinicaVeterinaria = null;

    public function openModal(ClinicaVeterinaria $clinicaVeterinaria)
    {
        $this->clinicaVeterinaria = $clinicaVeterinaria;

        $this->deleteModal = true;
    }

    public function destroy(ClinicaVeterinaria $clinicaVeterinaria)
    {
        $clinicaVeterinaria->delete();

        session()->flash('success', 'Clínica veterinária' . $clinicaVeterinaria->nome . ' deletada com sucesso !');

        $this->deleteModal = false;
    }

    public function render()
    {
        return view(
            'admin.clinica-veterinaria.index-clinicas',
            [
                'clinicas' => ClinicaVeterinaria::latest()->paginate()
            ]
        )->layout('layouts.admin');
    }
}
