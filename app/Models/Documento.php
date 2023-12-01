<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];

    // public function saveDocumento($path)
    // {
    //     $caminhoDoArquivo = $this->salvarArquivo($path);

    //     $this->path = $caminhoDoArquivo;
    //     $this->save();
    // }

    // public function salvarArquivo($path)
    // {
    //     //$caminhoNoDisco = $arquivo->store('docs');
        
    //     $caminhoCompleto = '/home/gbluckmann/2-gerenciador-zoonose-master/public/docs';

    //     return $caminhoCompleto;
    // }
}
