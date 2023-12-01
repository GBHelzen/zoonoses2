<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Raca extends Model
{
    use HasFactory, SoftDeletes, Blameable, LogsActivity;

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'especie_id');
    }

    public function animais()
    {
        $animais = Animal::where('raca', $this->nome)->get();
        return $animais;
    }

}
