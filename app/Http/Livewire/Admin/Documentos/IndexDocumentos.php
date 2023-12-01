<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Livewire\Component;

class IndexDocumentos extends Component
{
    public $deleteModal  = false;

    public $documento = null;
    public $search = '';

    public function openModal(Documento $documento)
    {
        $this->documento = $documento;

        $this->deleteModal = true;
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();

        session()->flash('success', 'Documento' . $documento->nome_arquivo . ' deletado com sucesso!');

        $this->deleteModal = false;
    }

    public function render()
    {
        return view(
            'admin.documentos.index-documentos',
            [
                'documentos' => Documento::where('nome_arquivo', 'ilike', '%' . $this->search .  '%')
                    ->orderBy('nome_arquivo', 'asc')->paginate(10),
            ]
        )->layout('layouts.admin');
    }
}