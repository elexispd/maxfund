<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index() {
        $transactions = Transaction::latest()
                            ->take(5)
                            ->get();
        return view('admin.dashboard', compact('transactions'));
    }
}
