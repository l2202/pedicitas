<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable; //para poner en cola el correo
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage; //construir el correo
use Illuminate\Notifications\Notification;

class Notificacion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct( //lo quue tiene el correo
        public $titulo,
        public $mensaje
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable) //notifiable es la persona o modelo que recibe la notif
    {
        return ['mail'];  //por donde se manda la notificacion
    
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->titulo) //asunto
            ->line($this->mensaje) 
            ->action('Reserva una cita con nosotros', url('/')); //para redireccionar a login
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
