<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyInterestPaidNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;
    public $dailyInterest;
    public $totalInterestPaid;

    public function __construct($investment, $dailyInterest)
    {
        $this->investment = $investment;
        $this->dailyInterest = $dailyInterest;
        $this->totalInterestPaid = $investment->total_interest_paid;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Daily Interest Credited - MaxFund')
            ->markdown('emails.daily-interest', [
                'notifiable' => $notifiable,
                'investment' => $this->investment,
                'dailyInterest' => $this->dailyInterest,
                'totalInterestPaid' => $this->totalInterestPaid,
                'currentDate' => now()->format('F j, Y'),
                'url' => url('/investments')
            ]);
    }
}
