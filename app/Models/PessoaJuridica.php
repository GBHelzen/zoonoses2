<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaJuridica extends Model
{
    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];

    public $table = "pessoa_juridicas";


    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(Pessoa::class, 'responsavel_id');
    }

    public function animais()
    {
        return $this->hasMany(Animal::class, 'pessoa_juridica_id')->latest();
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'pessoa_juridica_id')->latest();
    }
}
