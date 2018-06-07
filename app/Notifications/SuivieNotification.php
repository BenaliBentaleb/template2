<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuivieNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $commentaire;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($commentaire)
    {
        $this->commentaire = $commentaire;
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
        ->line('Reply added  from ' .$this->commentaire->user->nom.' ' .$this->commentaire->user->prenom)
        ->action('Notification Action',null)
        ->line($this->commentaire->commentaire);
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
            'nom' => $this->commentaire->user->nom.' ' .$this->commentaire->user->prenom,
            'message' => $this->commentaire->user->nom.' '.'a commenter votre status',
           // 'profile'=>'http://127.0.0.1:8000/modifier/publication/'.$this->commentaire->publication_id,
           'profile'=> "http://127.0.0.1:8000/single/publication/".$this->commentaire->publication->slug
          
           
           
        ];
    }
}
