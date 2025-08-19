<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Investment extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;

    public function __construct($investment)
    {
        $this->investment = $investment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Investment Successful')
            ->view('emails.investment', [
                'investment' => $this->investment,
                'user' => $notifiable,
            ]);
    }
}
