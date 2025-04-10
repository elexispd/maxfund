<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Auth::user()->withdrawals()->latest()->get();
        return view('withdrawals.index', compact('withdrawals'));
    }

    public function create()
    {
        $wallets = Auth::user()->wallets;
        return view('withdrawals.create', compact('wallets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wallet_address' => 'required|numeric',
            'amount' => 'required|numeric', // Minimum withdrawal $10
        ]);

        $user = Auth::user();

        // Check if user has sufficient balance
        if ($user->balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient balance for this withdrawal.']);
        }

        // Deduct from user balance immediately
        $user->balance -= $request->amount;
        $user->save();

        // Create withdrawal request
        $withdrawal = Withdrawal::create([
            'user_id' => $user->id,
            'wallet_id' => $request->wallet_address,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        // Record transaction
        $user->transactions()->create([
            'type' => 'withdrawal',
            'amount' => $request->amount,
            'description' => "Withdrawal request of {$request->amount} {$request->currency}",
        ]);

        return redirect()->route('user.withdraw.create')
            ->with('success', 'Withdrawal request submitted successfully.');
    }
}
