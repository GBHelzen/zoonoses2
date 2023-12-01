<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Contato extends Model
{
    use HasFactory, SoftDeletes, Blameable, LogsActivity;

    protected static $logUnguarded = true;

    const CONFIRMADO = 'confirmado';
    const FRACASSADO = 'fracassado';
    const DESISTENTE = 'desistente';

    protected $guarded = [];




    public function statusLabels()
    {
        if ($this->status == self::CONFIRMADO) {
            return 'bg-green-100 text-green-800';
        }
        if ($this->status == self::FRACASSADO) {
            return 'bg-yellow-100 text-yellow-800';
        }
        if ($this->status == self::DESISTENTE) {
            return 'bg-red-200 text-red-800';
        }
    }

    public function servico()
    {
        return $this->hasOne(Servico::class, 'servico_id');
    }

}
