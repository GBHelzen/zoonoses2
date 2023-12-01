<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DadosSocioEconomico extends Model
{
    protected $table = "dados_socio_economicos";

    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];

    protected $casts = [
        'programas_sociais' => 'array',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
}
