<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = auth()->user()->referrals()
         ->with('referrer') // Now this will work
         ->latest()->get();

        return view('referrals.index', compact('referrals'));
    }
}
