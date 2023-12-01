<?php

namespace App\Http\Livewire\Admin\Documentos;

use App\Models\Documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditDocumento extends Component
{
    public Documento $documento;


    function rules()
    {
        return [
            'documento.arquivo' => ['required'],
            'documento.nome_arquivo' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $this->documento->save();
        });

        session()->flash('success', 'Documento ' . $this->documento->nome_arquivo . ' editado com sucesso !');

        return redirect()->route('documentos.index');
    }

    public function mount(Documento $documento)
    {
        $this->documento = $documento;
    }
    public function render()
    {
        return view('admin.documentos.edit-documento')->layout('layouts.admin');
    }
}
