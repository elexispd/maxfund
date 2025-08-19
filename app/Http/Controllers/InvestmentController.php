<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Notifications\Investment;
use App\Models\User;

class InvestmentController extends Controller
{



    public function index()
    {
        $investments = Auth::user()->investments()
            ->with('plan') // Eager load the plan relationship
            ->latest()
            ->get();

        return view('investments.index', compact('investments'));
    }

    public function list()
    {
        $investmentPlans = InvestmentPlan::all();
        return view('investments.list', compact('investmentPlans'));
    }

    public function create(InvestmentPlan $plan)
    {
        return view('investments.create', compact('plan'));
    }

    public function store(Request $request)
    {
        $plan = InvestmentPlan::findOrFail($request->plan_id);

        $validated = $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:' . $plan->min_amount,
                'max:' . $plan->max_amount
            ],
            'plan_id' => 'required|exists:investment_plans,id'
        ], [
            'amount.required' => 'Please enter an investment amount',
            'amount.numeric' => 'Investment amount must be a number',
            'amount.min' => 'Minimum investment is $' . number_format($plan->min_amount, 2),
            'amount.max' => 'Maximum investment is $' . number_format($plan->max_amount, 2)
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user();

            // Check if this is user's first investment
            $isFirstInvestment = $user->investments()->count() === 0;

            if ($user->balance < $validated['amount']) {
                throw new \Exception('Insufficient balance. You need $' .
                    number_format($validated['amount'] - $user->balance, 2) .
                    ' more to invest in this plan.');
            }

            // Deduct balance
            $user->decrement('balance', $validated['amount']);

            // Create transaction
            $user->transactions()->create([
                'amount' => $validated['amount'],
                'type' => 'investment',
                'status' => 'completed',
                'description' => 'Investment in ' . $plan->name
            ]);

            // Create investment
            $dailyProfit = ($validated['amount'] * $plan->interest_rate) / 100;
            $investment = $user->investments()->create([
                'plan_id' => $plan->id,
                'amount' => $validated['amount'],
                'expected_profit' => $dailyProfit * $plan->duration_days,
                'status' => 'active',
                'start_date' => now(),
                'end_date' => now()->addDays($plan->duration_days)
            ]);

            // Process referral bonus if this is first investment
            if ($isFirstInvestment && $user->referred_by) {
                $referrer = User::find($user->referred_by);
                if ($referrer) {
                    $referralBonus = $validated['amount'] * 0.05; // 5% of investment

                    // Credit referrer
                    $referrer->increment('balance', $referralBonus);

                    // Create transaction for referrer
                    $referrer->transactions()->create([
                        'amount' => $referralBonus,
                        'type' => 'referral_bonus',
                        'status' => 'completed',
                        'description' => 'Referral bonus from ' . $user->name
                    ]);

                    // Send notification
                    $referrer->notify(new \App\Notifications\ReferralBonusNotification(
                        $referrer,
                        $user,
                        $referralBonus
                    ));
                }
            }

            $user->notify(new \App\Notifications\InvestmentCreatedNotification($investment, $plan));

            DB::commit();

            return redirect()
                ->route('user.investment.create', ['plan' => $plan->slug])
                ->with('success', 'Investment created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Investment Error: '.$e->getMessage());

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
