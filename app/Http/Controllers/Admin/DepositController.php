<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->validate([
            'status' => 'nullable|in:pending,approved,rejected'
        ])['status'] ?? null;

        $deposits = Deposit::when($status, function($query, $status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        return view('admin.deposits.index', compact('deposits', 'status'));
    }

    public function approve(Deposit $deposit)
    {
        $deposit->update(['status' => 'approved']);
        //update user's balance
        $user = $deposit->user;
        $user->balance += $deposit->amount;
        $user->save();
        return redirect()->back()->with('success', 'Deposit approved successfully.');
    }

    public function reject(Deposit $deposit)
    {
        $deposit->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Deposit rejected successfully.');
    }

}
