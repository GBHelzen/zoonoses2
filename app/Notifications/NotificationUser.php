<?php

namespace App\Notifications;

use App\Models\ServicoAtendimento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationUser extends Notification implements ShouldQueue
{
    use Queueable;
    private $atendimento;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ServicoAtendimento $atendimento)
    {
        $this->atendimento = $atendimento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from('uvcz.pmbv@gmail.com')
                    ->greeting('Olá, '.($this->atendimento->servico->ong != null ? $this->atendimento->servico->ong->nome_fantasia : $this->atendimento->servico->pessoa->user->name).',')
                    ->line('comunicamos-lhe por meio deste, da realização de uma palestra que acontecerá no dia '.date("d/m/Y", strtotime($this->atendimento->data)).',
                    às '. \Carbon\Carbon::parse($this->atendimento->hora)->format('H:i') .' horas, relacionada ao seu animal: '.$this->atendimento->servico->animal->nome.'.')
                    ->line('A palestra será realizada no(a) '.$this->atendimento->localAtendimento->complemento.', localizado(a) no(a) '.$this->atendimento->localAtendimento->endereco.', '.$this->atendimento->localAtendimento->numero.', '.$this->atendimento->localAtendimento->bairro.'.')
                    ->line('Sua participação é obrigatória, como forma de dar continuidade ao serviço de '.$this->atendimento->servico->categoria->nome.'.')
                    ->subject('Comunicação de Palestra - Zoonoses')
                    ->action('Ver palestra', url('https://zoonoses.boavista.rr.gov.br/login'))
                    ->line('Estamos à sua espera!');
                    //->to($this->servico->user->email);
                    //Mail::to('tonylimaskyrim@gmail.com')->send(new SendMail($details, $user));
                    //->markdown('emails.send-email')
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
