<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $user_id = $user->id;
         $transactions = transaction::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        return view('transaction', compact('transactions'));
    }
}


