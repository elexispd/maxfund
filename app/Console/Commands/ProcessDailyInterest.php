<?php

namespace App\Console\Commands;

use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Notifications\DailyInterestPaidNotification;

class ProcessDailyInterest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investments:process-daily-interest';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Process daily interest payments for active investments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    $this->info('Starting daily interest processing...');

    DB::transaction(function () {
        $investments = Investment::with(['user', 'plan'])
            ->where('status', 'active')
            ->whereDate('start_date', '<=', Carbon::today())
            ->whereDate('end_date', '>=', Carbon::today())
            ->get();

        $this->info("Found {$investments->count()} active investments to process.");

        foreach ($investments as $investment) {
            try {
                // Debug: Log current values before update
                // $this->info("Before update - Investment ID: {$investment->id}");
                // $this->info("Last payment date: {$investment->last_interest_payment_date}");
                // $this->info("Total interest paid: {$investment->total_interest_paid}");
                // $this->info("User balance: {$investment->user->balance}");

                // Skip if interest was already paid today
                if ($investment->last_interest_payment_date &&
                    Carbon::parse($investment->last_interest_payment_date)->isToday()) {
                    $this->line("Skipping investment ID {$investment->id} - interest already paid today");
                    continue;
                }

                $dailyInterest = $this->calculateDailyInterest($investment);
                // $this->info("Calculated daily interest: {$dailyInterest}");

                // Credit user's balance - add explicit check
                $originalBalance = $investment->user->balance;
                $investment->user->increment('balance', $dailyInterest);
                $newBalance = $investment->user->refresh()->balance;

                // $this->info("Balance update - From: {$originalBalance}, Added: {$dailyInterest}, To: {$newBalance}");

                // Record transaction
                $transaction = $investment->user->transactions()->create([
                    'amount' => $dailyInterest,
                    'type' => 'daily_interest',
                    'status' => 'completed',
                    'description' => 'Daily interest from '.$investment->plan->name
                    // 'reference' => 'INT-'.Carbon::today()->format('Ymd').'-'.$investment->id
                ]);

                // $this->info("Created transaction ID: {$transaction->id}");

                // Update investment tracking - using fresh query to avoid caching
                $updateResult = Investment::where('id', $investment->id)->update([
                    'last_interest_payment_date' => Carbon::now()->toDateTimeString(),
                    'total_interest_paid' => DB::raw("COALESCE(total_interest_paid, 0) + {$dailyInterest}")
                ]);

                // $this->info("Update result: {$updateResult} rows affected");

                // Refresh and log updated investment
                $updatedInvestment = Investment::find($investment->id);
                // $this->info("After update - Last payment date: {$updatedInvestment->last_interest_payment_date}");
                // $this->info("After update - Total interest paid: {$updatedInvestment->total_interest_paid}");

                // Send notification
                $investment->user->notify(new DailyInterestPaidNotification($updatedInvestment, $dailyInterest));

            } catch (\Exception $e) {
                $this->error("Error processing investment ID {$investment->id}: ".$e->getMessage());
                Log::error("Daily interest processing error", [
                    'investment_id' => $investment->id,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                continue;
            }
        }
    });

    $this->info('Daily interest processing completed!');
    return 0;
}

    /**
     * Calculate the daily interest for an investment
     * Now correctly calculates the specified percentage of the investment amount daily
     */
    protected function calculateDailyInterest(Investment $investment)
    {
        // Get the daily interest rate from the plan
        $dailyRate = $investment->plan->interest_rate / 100; // Convert percentage to decimal

        // Calculate daily interest
        $dailyInterest = $investment->amount * $dailyRate;

        // Round to 2 decimal places for currency
        return round($dailyInterest, 2);
    }
}
