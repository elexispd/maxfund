<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Investment;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $stats = [
            'totalUsers' => User::where('id', "!=", Auth::id())
                                ->where('status', 'active')
                                ->count(),
            'totalWithdraws' => Withdrawal::all()
                                ->count(),
            'totalPendingWithdraws' => Withdrawal::where('status', 'pending')
                                ->count(),
            'activeInvestments' => Investment::where('status', 'active')
                                ->count(),

        ];
        $transactions = Transaction::latest()
                            ->take(5)
                            ->get();
        return view('admin.dashboard', compact('stats', 'transactions'));
    }
}
