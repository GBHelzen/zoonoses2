<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocumento extends Component
{
    use WithFileUploads;
    public Documento $documento;

    public $arquivo;
    public $nome_arquivo;

    // function rules()
    // {
    //     return [
    //         'documento.arquivo' => ['required', 'file'],
    //         'documento.nome_arquivo' => ['required', 'string'],
    //     ];
    // }

    public function save()
    {
        $this->validate([
            'arquivo' => 'file|max:5120', // 5MB Max
        ]);

        // Pegar o nome original do arquivo e armazena-lo na pasta docs
        $arquivo = $this->arquivo->getClientOriginalName();
        $this->arquivo->storeAs('docs', $arquivo);

        // Salvando no banco de dados
        $documento = new Documento;
        $documento->arquivo = $arquivo;
        $documento->nome_arquivo = $this->nome_arquivo;
        $documento->path = basename($arquivo);
        $documento->save();

        session()->flash('success', 'Documento ' . $this->documento->nome_arquivo . ' cadastrado com sucesso!');

        return redirect()->route('documentos.index');

    }

    // public function store()
    // {
    //     $this->validate();

    //     DB::transaction(function () {
    //         $this->documento->save();
    //         //->saveDocumento($this->documento->arquivo);
    //     });

    //     session()->flash('success', 'Documento ' . $this->documento->nome_arquivo . ' cadastrado com sucesso!');

    //     return redirect()->route('documentos.index');
    // }

    public function mount()
    {
        $this->documento = new Documento();
    }


    public function render()
    {
        return view('admin.documentos.create-documento')->layout('layouts.admin');
    }
}