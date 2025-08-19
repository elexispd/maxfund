<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositStatusNotification extends Notification 
{
    use Queueable;

    public $deposit;
    public $status;
    public $reason;

    public function __construct($deposit, $status, $reason = null)
    {
        $this->deposit = $deposit;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $subject = "Deposit " . ucfirst($this->status);
        $url = url('/dashboard');

        return (new MailMessage)
            ->subject($subject)
            ->markdown('emails.deposit-status', [
                'user' => $notifiable,
                'deposit' => $this->deposit,
                'status' => $this->status,
                'reason' => $this->reason,
                'url' => $url
            ]);
    }
}
