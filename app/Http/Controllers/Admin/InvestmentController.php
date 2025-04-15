<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;

class InvestmentController extends Controller
{
    public function index(Request $request) {
        $status = $request->validate([
            'status' => 'nullable|in:pending,approved,rejected'
        ])['status'] ?? null;
        $investments = Investment::latest()
            ->with('plan')
            ->get();

        return view('admin.investments.index', compact('investments','status'));
    }

    public function plans() {
        $investmentPlans = InvestmentPlan::all();
        return view('admin.investments.list', compact('investmentPlans'));
    }
}
