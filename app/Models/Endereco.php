<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory, SoftDeletes, Blameable;

    protected $guarded = [];

    // public function model()
    // {
    //     return $this->morphTo();
    // }
    

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'endereco_id');
    }

    public function clinicas()
    {
        return $this->hasMany(ClinicaVeterinaria::class, 'endereco_id');
    }

    public function hasManyOwners()
    {
        if($this->pessoas->count() > 1){
            return true;
        }

        return false;
    }

    public function scopePalestras($query)
    {
        return $query->where('is_local_palestra', true);
    }

  
}
