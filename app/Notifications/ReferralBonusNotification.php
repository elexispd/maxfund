<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralBonusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $referrer;
    public $referredUser;
    public $bonusAmount;

    public function __construct($referrer, $referredUser, $bonusAmount)
    {
        $this->referrer = $referrer;
        $this->referredUser = $referredUser;
        $this->bonusAmount = $bonusAmount;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You Received a Referral Bonus!')
            ->view('emails.referral-bonus', [
                'referrer' => $this->referrer,
                'referredUser' => $this->referredUser,
                'bonusAmount' => $this->bonusAmount,
                'dashboardUrl' => url('/dashboard'),
            ]);
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'You received $' . number_format($this->bonusAmount, 2) . 
                         ' referral bonus from ' . $this->referredUser->name . '\'s first investment',
            'url' => '/transactions',
            'icon' => 'fa-money-bill-transfer'
        ];
    }
}
