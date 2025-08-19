<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    // List transfers of logged-in user
    public function index()
    {
        $transfers = Transfer::with(['sender', 'receiver'])
            ->where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->latest()
            ->get();
        return view('transfers.index', compact('transfers'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())
            ->where('role', 'user') // only users with role "user"
            ->get();

        return view('transfers.create', compact('users'));
    }

    // Store transfer
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id|different:sender_id',
            'amount' => 'required|numeric|min:1',
        ]);

        $sender = Auth::user();
        $receiver = User::findOrFail($request->receiver_id);

        if ($sender->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance.');
        }

        DB::transaction(function () use ($sender, $receiver, $request) {
            // Debit sender
            $sender->decrement('balance', $request->amount);

            // Credit receiver
            $receiver->increment('balance', $request->amount);

            // Record transfer
            Transfer::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'amount' => $request->amount,
            ]);
             $sender->transactions()->create([
                'amount' => $request->amount,
                'type' => 'transfer',
                'status' => 'completed',
                'description' => 'Transfer money to ' . $receiver->name
            ]);
        });

        return redirect()->route('transfer.create')->with('success', 'Transfer completed successfully.');
    }
}
