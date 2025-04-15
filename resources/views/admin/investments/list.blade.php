@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Available Investment Plans</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($investmentPlans as $plan)
                        <div class="col-md-4 mb-4">
                            <div class="card plan-card h-100">
                                <div class="card-body text-center">
                                    <h3 class="card-title text-primary">{{ $plan->name }}</h3>
                                    <div class="plan-details mt-4">
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Daily Profit:</span>
                                            <strong>{{ $plan->interest_rate }}%</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Minimum:</span>
                                            <strong>${{ number_format($plan->min_amount, 2) }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Maximum:</span>
                                            <strong>${{ number_format($plan->max_amount, 2) }}</strong>
                                        </div>
                                        <div class="d-flex justify-content-between py-2">
                                            <span>Duration:</span>
                                            <strong>{{ $plan->duration_days }} days</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .plan-card {
        transition: transform 0.3s ease;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .plan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
