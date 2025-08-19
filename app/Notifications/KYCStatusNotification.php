<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class KYCStatusNotification extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject("KYC Verification {$this->status} - MaxFund")
            ->view('emails.kyc-status', [
                'notifiable' => $notifiable,
                'status' => $this->status,
                'reason' => $this->reason
            ]);
    }
}
