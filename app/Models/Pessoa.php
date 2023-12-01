<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];

    public function perfilCompleto()
    {
        if ($this->ong != null) {
            if($this->ong->finalizou_cadastro_pessoa &&   $this->ong->endereco)
                return true;
        } else {
            if ($this->finalizou_cadastro_pessoa && $this->endereco && $this->dadosSocioEconomicos)
                return true;
        }


        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

    public function dadosSocioEconomicos()
    {
        return $this->hasOne(DadosSocioEconomico::class, 'pessoa_id');
    }

    public function ong()
    {
        return $this->hasOne(PessoaJuridica::class, 'responsavel_id');
    }

    public function animais()
    {
        return $this->hasMany(Animal::class, 'pessoa_id')->latest();
    }

    public function naoEletivo()
    {
        if(!$this->ong && $this->dadosSocioEconomicos->renda_familiar >= 3636.01 &&
        !$this->dadosSocioEconomicos->participa_programa_social && $this->numero_cad_unico == null){
            return true;
        }else{
            return false;
        }
        // return $this->dadosSocioEconomicos()->where('renda_familiar', '>', 3636.01)->where('participa_programa_social', 0);
    }

    public function servicos()
    {
        return $this->hasMany(Servico::class, 'pessoa_id')->latest();
    }
}
