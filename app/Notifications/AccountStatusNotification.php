<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;

class AccountStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $status;
    public $reason;

    public function __construct($status, $reason = null)
    {
        $this->status = $status;
        $this->reason = $reason;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        Log::info('Attempting to send welcome email to: '.$notifiable->email);
        return (new MailMessage)
            ->subject("Account {$this->status} - MaxFund")
            ->view('emails.account-status', [
                'notifiable' => $notifiable,
                'status' => $this->status,
                'reason' => $this->reason
            ]);
    }
}
