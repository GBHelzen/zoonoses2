<?php

namespace App\Models;

use App\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Animal extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Blameable, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['servicos'];

    protected $cascadeDeletes = ['servicos'];

    // protected $casts = [
    //     'vacinado_raiva_data' => 'date',
    //     'vacinado_polivalente_data' => 'date',
    // ];

    // public function registerMediaConversions(?Media $media = null): void
    // {
    // $this
    //     ->addMediaConversion('preview')
    //     ->fit(Manipulations::FIT_CROP, 300, 300)
    //     ->nonQueued();
    // }

    // Um animal pode ter varios serviços
    public function servicos()
    {
        return $this->hasMany(Servico::class, 'animal_id');
    }

    // Verifica se o animal possui um serviço em aberto
    public function getServicoEmAbertoAttribute()
    {
        return $this->servicos()->where('animal_id', $this->id)->whereIn('status',  [Servico::AGUARDANDO, Servico::AGENDADO, Servico::PARA_CASTRACAO])->first();
    }

    // Verifica se o animal foi castrado com sucesso
    public function getServicoConcluidoAttribute()
    {
        return $this->servicos()->where('animal_id', $this->id)->whereIn('status',  [Servico::CONFIRMADO])->first();
    }

    // Verifica se o dono do animal tem alguma palestra agendada em aberto
    public function getPalestraEmAbertoAttribute()
    {
        $palestra = '';
        foreach($this->servicos as $servico){
            if($servico->atendimento != null and ($servico->atendimento->data >= date("Y-m-d")) and $servico->status == 'agendado'){
                $palestra = $servico->atendimento->data.$servico->atendimento->hora;
            }
        }

        if($palestra != ''){
            return date('d/m/Y H:i', strtotime($palestra));
        }

        return false;

    }

    public function ong()
    {
        return $this->belongsTo(PessoaJuridica::class, 'pessoa_juridica_id');
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class, 'nome');
    }

    public function racaNome()
    {
        $raca = Raca::where('id', $this->raca)->get();
        return $raca;
    }
}
