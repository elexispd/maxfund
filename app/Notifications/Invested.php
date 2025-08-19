namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Investment extends Notification implements ShouldQueue
{
    use Queueable;

    public $investment;

    public function __construct($investment)
    {
        $this->investment = $investment;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also add 'database', 'sms', etc.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Investment Confirmation')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Thank you for your investment.')
            ->line('Amount: $' . number_format($this->investment->amount, 2))
            ->line('Plan: ' . $this->investment->plan->name)
            ->line('Date: ' . $this->investment->created_at->format('M j, Y h:i A'))
            ->line('We’ll notify you when your investment matures.')
            ->salutation('Thanks for choosing us!');
    }
}
