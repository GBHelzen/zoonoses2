<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDocumento extends Component
{
    use WithFileUploads;
    public Documento $documento;

    public $arquivo;
    public $nome_arquivo;
    
    public function mount(Documento $documento)
    {
        $this->documento = $documento;
        $this->nome_arquivo = $this->documento->nome_arquivo;
        $this->arquivo = $this->documento->arquivo;
    }
    public function updateData()
    {

        $this->validate([
            'arquivo' => 'file|mimes:pdf,doc,docx|max:20480', // 5MB Max
            'nome_arquivo' => 'required',
        ]);
        
        $data = $this->documento;

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

    public function render()
    {
        return view('admin.documentos.edit-documento')->layout('layouts.admin');
    }
}