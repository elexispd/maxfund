<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalStatusNotification;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->validate([
            'status' => 'nullable|in:pending,approved,rejected'
        ])['status'] ?? null;

        $withdraws = Withdrawal::with(['user', 'wallet'])
            ->when($status, function($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->get();

        return view('admin.withdrawals.index', compact('withdraws', 'status'));
    }

    public function approve(Withdrawal $withdraw)
    {
        $withdraw->update(['status' => 'approved']);
        $withdraw->user->notify(new WithdrawalStatusNotification($withdraw, 'approved'));
        return redirect()->back()->with('success', 'Withdrawal approved successfully.');
    }

    public function reject(Withdrawal $withdraw)
    {
        $withdraw->update(['status' => 'rejected']);
        $withdraw->user->notify(new WithdrawalStatusNotification($withdraw, 'rejected'));
        return redirect()->back()->with('success', 'Withdrawal rejected successfully.');
    }
}
