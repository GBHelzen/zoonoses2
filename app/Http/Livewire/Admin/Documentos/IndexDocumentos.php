<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexDocumentos extends Component
{   
    use WithFileUploads;
    public $arquivo;
    public $nome_arquivo;
    public $documento_id;
    public $update = false;
    public $deleteModal  = false;

    public $documento = null;
    public $search = '';

    public function updateDocumento($id)
    {
        $documento = Documento::find($id);

        $this->documento_id = $documento->id;
        $this->arquivo = $documento->arquivo;
        $this->nome_arquivo = $documento->nome_arquivo;
        $this->update=true;
    }

    public function updateData()
    {

        $this->validate([
            'arquivo' => 'file|max:5120', // 5MB Max
            'nome_arquivo' => 'required',
        ]);
        
        $data = Documento::find($this->documento_id);

        // Pegar o nome original do arquivo e armazena-lo na pasta docs
        $arquivo = $this->arquivo->getClientOriginalName();
        $this->arquivo->storeAs('docs', $arquivo);

        $data->arquivo = $arquivo;
        $data->nome_arquivo = $this->nome_arquivo;
        $data->path = ('/storage/docs/' . basename($arquivo));
        $data->save();

        session()->flash('success', 'Documento ' . $data->nome_arquivo . ' editado com sucesso!');

        return redirect()->route('documentos.index');
    }

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
                'documentos' => Documento::latest()->paginate()
            ]
        )->layout('layouts.admin');
    }
}