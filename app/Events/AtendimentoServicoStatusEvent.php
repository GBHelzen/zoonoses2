<?php

namespace App\Events;

use App\Models\ServicoAtendimento;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AtendimentoServicoStatusEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $atendimento;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ServicoAtendimento $atendimento)
    {
        // Log::info($atendimento);
        // Log::info($atendimento->servico);
        // Log::info($atendimento->servico->animal);
        $this->atendimento = $atendimento;
        // Log::info($atendimento);
        // Log::info($atendimento->servico);
        // Log::info($atendimento->servico->animal);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
