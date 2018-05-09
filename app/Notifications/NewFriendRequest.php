<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewFriendRequest extends Notification implements ShouldQueue
{
    use Queueable;
    public $user ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        ->line('You have received a new friend request from'.$this->user->nom)
        ->action('View profile',route('user.profile',['id'=>$this->user->id]))
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
            'nom' => $this->user->nom.' '.$this->user->prenom,
            'message' => $this->user->nom.' '.'a envoyé une invitation',
            'profile'=>asset('profile/'.$this->user->id)//route('user.profile',['id'=>$this->user->id])
        ];
    }
}
