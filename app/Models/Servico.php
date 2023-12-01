<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Activitylog\Traits\LogsActivity;

class Servico extends Model
{
    use HasFactory, SoftDeletes, Blameable, LogsActivity;

    protected static $logUnguarded = true;

    const AGUARDANDO = 'aguardando';
    const PARA_CASTRACAO = 'para_castracao';
    const CONFIRMADO = 'confirmado';
    const CANCELADO = 'cancelado';
    const AGENDADO = 'agendado';

    protected $guarded = [];

    protected $with = ['atendimento'];


    public $casts = [
        'data_solicitacao' => 'date'
    ];

    public function statusLabel()
    {
        if ($this->status == self::AGUARDANDO) {
            return 'bg-indigo-100 text-indigo-800';
        }
        if ($this->status == self::PARA_CASTRACAO) {
            return 'bg-yellow-500 text-white';
        }
        if ($this->status == self::CONFIRMADO) {
            return 'bg-green-100 text-green-800';
        }
        if ($this->status == self::CANCELADO) {
            return 'bg-red-100 text-red-800';
        }
        if ($this->status == self::AGENDADO) {
            return 'bg-gray-600 text-white';
        }
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaServico::class, 'categoria_id');
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function ong()
    {
        return $this->belongsTo(PessoaJuridica::class, 'pessoa_juridica_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function atendimento()
    {
        return $this->hasOne(ServicoAtendimento::class, 'servico_id');
    }

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'servico_id', 'id');
    }
}
