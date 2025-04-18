<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Withdrawal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'totalInvested' => Investment::where('user_id', $user->id)
                                ->where('status', 'active')
                                ->sum('amount'),
            'totalReferrals' => User::where('referred_by',  $user->id)
                                ->count(),
            'activeInvestments' => Investment::where('user_id', $user->id)
                                ->where('status', 'active')
                                ->count(),
            'payouts' => Withdrawal::where('user_id', $user->id)
                                ->where('status', 'approved')
                                ->sum('amount')
        ];
        $transactions = Transaction::where('user_id', $user->id)
                            ->latest()
                            ->take(5)
                            ->get();


        return view('dashboard', compact('stats', 'transactions'));
    }
}
