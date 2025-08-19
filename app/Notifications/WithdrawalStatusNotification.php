<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $withdrawal;
    public $status;
    public $reason;

    public function __construct($withdrawal, $status, $reason = null)
    {
        $this->withdrawal = $withdrawal;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Withdrawal {$this->status} - MaxFund")
            ->view('emails.withdrawal-status', [
                'notifiable' => $notifiable,
                'withdrawal' => $this->withdrawal,
                'status' => $this->status,
                'reason' => $this->reason,
                'url' => url('/withdraw')
            ]);
    }
}
