<?php

namespace App\Http\Controllers;

use App\Models\InvestmentPlan;

use Illuminate\Http\Request;

class InvestmentPlanController extends Controller
{
    public function create() {
        return view('admin.investments.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:investment_plans,name',
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|gte:min_amount',
            'interest_rate' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
        ]);

        InvestmentPlan::create($request->all());

        return redirect()->route('admin.investment.create')->with('success', 'Plan created successfully');
    }

    public function edit(InvestmentPlan $plan)
    {
        return view('admin.investments.edit', compact('plan'));
    }

    // Update plan
    public function update(Request $request, InvestmentPlan $plan)
    {
        $request->validate([
            'name' => 'required|unique:investment_plans,name,' . $plan->id,
            'min_amount' => 'required|numeric|min:0',
            'max_amount' => 'required|numeric|gte:min_amount',
            'interest_rate' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
        ]);

        $plan->update($request->all());

        return redirect()->route('admin.investment.plan')->with('success', 'Plan updated successfully');
    }

    public function destroy(InvestmentPlan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.investment.plan')->with('success', 'Plan deleted successfully');
    }


}
