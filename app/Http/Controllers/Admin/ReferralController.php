<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ReferralController extends Controller
{
    public function index(User $user)
    {
        $referrals = $user->referrals()
            ->latest()
            ->get();


        return view('admin.referrals.index', [
            'user' => $user,
            'referrals' => $referrals
        ]);
    }
}
