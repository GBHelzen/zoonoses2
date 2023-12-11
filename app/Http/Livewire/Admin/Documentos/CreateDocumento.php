<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocumento extends Component
{
    use WithFileUploads;
    public Documento $documento;

    public $arquivo;
    public $nome_arquivo;

    public function save()
    {
        $this->validate([
            'arquivo' => 'file|mimes:pdf,doc,docx,xls,xlsx|max:20480', // 20MB Max
            'nome_arquivo' => 'required',
        ]);

        // Pegar o nome original do arquivo e armazena-lo na pasta docs
        $arquivo = $this->arquivo->getClientOriginalName();
        $this->arquivo->storeAs('docs', $arquivo);

        // Salvando no banco de dados
        $documento = new Documento;
        $documento->arquivo = $arquivo;
        $documento->nome_arquivo = $this->nome_arquivo;
        $documento->path = ('/storage/docs/' . basename($arquivo));
        $documento->save();

        session()->flash('success', 'Documento ' . $documento->nome_arquivo . ' cadastrado com sucesso!');

        return redirect()->route('documentos.index');

    }

    public function mount()
    {
        $this->documento = new Documento();
    }

    public function render()
    {
        return view('admin.documentos.create-documento')->layout('layouts.admin');
    }
}