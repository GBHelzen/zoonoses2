<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClinicaVeterinaria extends Model
{
    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];


    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }
}
