<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Especie extends Model
{
    use HasFactory, SoftDeletes, Blameable, LogsActivity;

    public function racas()
    {
        return $this->hasMany(Raca::class, 'especie_id', 'id');
    }
}
