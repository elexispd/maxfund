<?php

namespace App\Notifications;

use App\Models\Deposit;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DepositReceivedNotification extends Notification
{
    protected $deposit;

    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
    }

    public function via($notifiable)
    {
        return ['mail']; // Send via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Deposit Received')
            ->view('emails.deposit_received', [
                'user' => $this->deposit->user,
                'deposit' => $this->deposit,
            ]);
    }
}
