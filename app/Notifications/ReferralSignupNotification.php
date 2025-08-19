<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralSignupNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $referral;
    public $newUser;

    public function __construct($referral, $newUser)
    {
        $this->referral = $referral;
        $this->newUser = $newUser;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Great News! Your Referral Joined MaxFund')
            ->view('emails.referral-signup', [
                'referral' => $this->referral,
                'newUser' => $this->newUser,
                'referralLink' => url('/register?ref='.$this->referral->referral_code)
            ]);
    }
}
