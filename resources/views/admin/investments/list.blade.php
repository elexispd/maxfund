@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="color: #191970; font-weight:bolder;">Available Investment Plans</h4>
                </div>
                <div class="card-body">
                     @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif



                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-3"></i>
                                <div class="text-danger">
                                    {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    <div class="row">
                        @foreach($investmentPlans as $plan)
                        <div class="col-md-4 mb-4">
                            <div class="card plan-card h-100">
                                <div class="card-body text-center">
                                    <h3 class="card-title" style="color: #191970; font-weight:bold;">{{ $plan->name }}</h3>
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
                                        <div class="d-flex justify-content-between py-2">
                                            <a href="{{ route('admin.investment.edit', $plan) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.investment.destroy', $plan) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this plan?')">Delete</button>
                                            </form>
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
