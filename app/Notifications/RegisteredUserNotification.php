<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisteredUserNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    // ->line('WOOOOOOOW !!!!!! The introduction to the notification.')
                    // // ->action('Notification Action', url('/'))
                    // ->line('new user has registered')
                    // ->line('email:'. 'xoxo@gmail.com')
                    // ->line('Thank you for using our application!');

                    ->line('hi'. $notifiable->name)
                    ->line('new user has registered')
                    ->line('email:'. $this->user->email)
                    ->line('thank u for using our application');
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
