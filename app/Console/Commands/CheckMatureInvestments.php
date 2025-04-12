<?php

namespace App\Console\Commands;

use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckMatureInvestments extends Command
{
    protected $signature = 'investments:check-mature';
    protected $description = 'Process completed investments';

    public function handle()
    {
        DB::transaction(function () {
            $investments = Investment::with('user')
                ->where('status', 'active')
                ->where('end_date', '<=', Carbon::now())
                ->get();

            foreach ($investments as $investment) {
                // Credit user's balance
                $investment->user->increment('balance', $investment->amount + $investment->expected_profit);

                // Record transaction
                $investment->user->transactions()->create([
                    'amount' => $investment->amount + $investment->expected_profit,
                    'type' => 'investment_payout',
                    'status' => 'completed',
                    'description' => 'Payout from '.$investment->plan->name
                ]);

                // Update investment status
                $investment->update(['status' => 'completed']);
            }

            $this->info("Processed {$investments->count()} investments.");
        });
    }
}
