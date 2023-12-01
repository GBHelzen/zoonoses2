<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocumento extends Component
{
    use WithFileUploads;
    public Documento $documento;
    public $arquivo;

    // public $arquivo;
    // public $nome_arquivo;

    function rules()
    {
        return [
            'arquivo' => ['required', 'file'],
            'nome_arquivo' => ['required', 'string'],
        ];
    }

    public function save()
    {
        $this->validate([
            'arquivo' => 'file|max:5120', // 5MB Max
        ]);
        
        $arquivo = $this->arquivo->getClientOriginalName();
        $this->arquivo->storeAs('docs', $arquivo);
        //$this->arquivo->move(public_path('docs'), $arquivo);

        // DB::transaction(function () {
        //     $this->documento->save();
        // });

        session()->flash('success', 'Documento ' . $this->documento->nome_arquivo . ' cadastrado com sucesso!');
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