<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;

class InvestmentController extends Controller
{
    public function index(Request $request)
{
    $validated = $request->validate([
        'status' => 'nullable|in:active,completed'
    ]);

    $status = $validated['status'] ?? null;

    $investments = Investment::when($status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->with('plan')
        ->latest()
        ->get();

    return view('admin.investments.index', compact('investments', 'status'));
}

    public function plans() {
        $investmentPlans = InvestmentPlan::all();
        return view('admin.investments.list', compact('investmentPlans'));
    }
}
