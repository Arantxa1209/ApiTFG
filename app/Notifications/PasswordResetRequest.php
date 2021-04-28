<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetRequest extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $url = url('/api/password/find/' . $this->token);
        return (new MailMessage)
            ->subject('Recuperar contraseña')
            ->greeting('Hola')
            //->line('Este enlace para restablecer la contraseña expirará en 60 minutos.')
            ->line('Ha recibido este correo electrónico porque hemos recibido una solicitud de recuperación de contraseña para su cuenta.')
            //->action('Cambiar Contraseña', url($url))
            ->line('Si no ha solicitado el restablecimiento de su contraseña, pongase en contacto con:')
            ->line(config('mail.from.address'))
            ->salutation('Saludos, '. config('app.name'));
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
