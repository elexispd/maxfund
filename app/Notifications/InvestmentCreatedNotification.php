<?php 

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;
    public $plan;

    public function __construct($investment, $plan)
    {
        $this->investment = $investment;
        $this->plan = $plan;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Investment Confirmation - MaxFund')
            ->markdown('emails.investment-created', [
                'notifiable' => $notifiable,
                'investment' => $this->investment,
                'plan' => $this->plan,
                'currentDate' => now()->format('d M, Y'),
                'maturityDate' => $this->investment->end_date,
                'url' => url('/investments')
            ]);
    }
}