<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        // Fetch the referral data for the authenticated user
        $referrals = auth()->user()->referrals()
            ->with('referrer') // Eager load the referrer relationship
            ->latest()
            ->paginate(10); // 10 items per page

        return view('referrals.index', compact('referrals'));
    }
}
