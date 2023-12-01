<?php

namespace App\Listeners;

use App\Events\AtendimentoServicoStatusEvent;
use App\Models\Servico;
use App\Notifications\NotificationUser;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateServicoStatusListenner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AtendimentoServicoStatusEvent  $event
     * @return void
     */
    public function handle(AtendimentoServicoStatusEvent $event)
    {
        $event->atendimento->hora = Carbon::parse($event->atendimento->hora)->format('H:i');

        if($event->atendimento->servico->status == Servico::AGUARDANDO){
            $event->atendimento->servico->status = Servico::AGENDADO;
            if ($event->atendimento->servico->ong != null) {
                $event->atendimento->servico->ong->responsavel->user->notify(new NotificationUser($event->atendimento));
                session()->flash('success', 'Atendimento da ong ' . $event->atendimento->servico->ong->razao_social . ' salvo com sucesso !');
            } else {
                $event->atendimento->servico->pessoa->user->notify(new NotificationUser($event->atendimento));
                session()->flash('success', 'Atendimento da pessoa ' . $event->atendimento->servico->pessoa->user->name . ' salvo com sucesso !');
            }
        }


        if (!is_null($event->atendimento->presenca)) {
            if ($event->atendimento->presenca == false) {
                $event->atendimento->servico->status = Servico::CANCELADO;
                $event->atendimento->pode_solicitar_guia = 0;
                $event->atendimento->guia_entregue = 0;
            } else {
                if($event->atendimento->data_castracao != (null and '')){
                    $event->atendimento->servico->status = Servico::CONFIRMADO;
                    $event->atendimento->servico->animal->animal_castrado = true;
                    $event->atendimento->servico->animal->animal_castrado_data = $event->atendimento->data_castracao;

                }else{
                    if($event->atendimento->executada === '0'){
                        $event->atendimento->servico->status = Servico::CANCELADO;
                        $event->atendimento->servico->animal->animal_castrado = false;
                        $event->atendimento->servico->animal->animal_castrado_data = null;
                        $event->atendimento->executada = false;
                    }else{
                        $event->atendimento->servico->status = Servico::PARA_CASTRACAO;
                        $event->atendimento->pode_solicitar_guia = true;
                    }
                }

                // $event->atendimento->servico->status = Servico::PARA_CASTRACAO;
                // $event->atendimento->pode_solicitar_guia = true;
            }
        }

        $event->atendimento->save();

        $event->atendimento->servico->save();

        $event->atendimento->servico->animal->save();

    }

}
