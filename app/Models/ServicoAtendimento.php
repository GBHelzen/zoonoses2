<?php

namespace App\Models;

use App\Traits\Blameable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class ServicoAtendimento extends Model
{
    use HasFactory;
    use SoftDeletes, Blameable, LogsActivity;

    protected static $logUnguarded = true;

    protected $guarded = [];

    public $dates = ['data_castracao'=>'date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $year = now()->year;

            $codigo = ServicoAtendimento::whereYear('data', $year)->count() + 1;

            $model->codigo =  str_pad($codigo, 7, "0", STR_PAD_LEFT) . '/' . $year;
        });
    }

    protected static function generateRandomCodigo($model)
    {
        $rand_number = rand(1, 9999999);

        if (!ServicoAtendimento::where('codigo', $rand_number)->first()) {
            $model->codigo = $rand_number . '/' . now()->year;
        } else {
            return self::generateRandomCodigo($model);
        }
    }

    public function getHoraAtendimento()
    {
        return Carbon::parse($this->hora)->format('H:i');
    }


    // public function getDataAttribute($value)
    // {
    //     return  Carbon::parse($value)->format('d/m/Y');
    // }

    public function getEnderecoAttribute()
    {
        $local = $this->localAtendimento;
        // dd($local);
        return "{$local->complemento}, {$local->endereco}, {$local->numero}";
    }

    public function localAtendimento()
    {
        return $this->belongsTo(Endereco::class, 'local_id');
    }

    //adicionado aqui
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id');
    }

    public function clinica()
    {
        return $this->belongsTo(ClinicaVeterinaria::class, 'clinica_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}
