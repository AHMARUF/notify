<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Email extends Notification implements ShouldQueue
{
    use Queueable;
    public $name = '';
    public $channels = '';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$channels)
    {
        $this->name = $name;
        $this->channels = $channels;
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
        /*return (new MailMessage)
                    ->line('hello')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/

        /*coustom mail template
        return(new MailMessage)->view('layouts.email');
        */
delay(now()->addMinutes(1));
        $name = $this->name;
        $channels = $this->channels;
        
        return(new MailMessage)->view('layouts.email',compact('name','channels'));
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
