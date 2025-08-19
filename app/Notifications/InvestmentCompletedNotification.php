<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentCompletedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;
    public $profit;
    public $totalPayout;

    public function __construct($investment)
    {
        $this->investment = $investment;
        $this->profit = $investment->expected_profit;
        $this->totalPayout = $investment->amount + $investment->expected_profit;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Investment Completed - MaxFund')
            ->markdown('emails.investment-completed', [
                'notifiable' => $notifiable,
                'investment' => $this->investment,
                'profit' => $this->profit,
                'totalPayout' => $this->totalPayout,
                'currentDate' => now()->format('F j, Y'),
                'url' => url('/investments')
            ]);
    }
}
