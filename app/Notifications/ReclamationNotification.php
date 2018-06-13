<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReclamationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $reclamation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reclamation)
    {
        $this->reclamation = $reclamation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','broadcast','database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'user' => $this->reclamation->user,
            'message' => $this->reclamation->user->nom.' ' .$this->reclamation->user->prenom.' a envoyer une reclamation',
            'url' => 'http://127.0.0.1:8000/reclamation/'.$this->reclamation->id
             
          
          
        ];
    }
}
