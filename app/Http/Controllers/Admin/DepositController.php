<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function index() {
        $deposits = Deposit::latest()->get();
        return view('admin.deposits.index', compact('deposits'));
    }
}
