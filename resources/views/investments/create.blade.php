@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-8 mx-auto">
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Invest in {{ $plan->name }} Plan</h4>
                    <p class="text-muted mb-0">
                        <i class="fas fa-info-circle"></i>
                        Plan Duration: {{ $plan->duration_days }} days |
                        Daily Interest: {{ $plan->interest_rate }}%
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.investment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                        <div class="form-group">
                            <label for="amount">Investment Amount (USD)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number"
                                       class="form-control @error('amount') is-invalid @enderror"
                                       id="amount"
                                       name="amount"
                                       step="0.01"
                                       min="{{ $plan->min_amount }}"
                                       max="{{ $plan->max_amount }}"
                                       value="{{ old('amount', $plan->min_amount) }}"
                                       required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Minimum: ${{ number_format($plan->min_amount, 2) }} |
                                Maximum: ${{ number_format($plan->max_amount, 2) }}
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Projected Returns</label>
                            <div class="alert alert-info">
                                <div class="d-flex justify-content-between">
                                    <span>Daily Profit:</span>
                                    <strong id="daily-profit">$0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Total Interest ({{ $plan->duration_days }} days):</span>
                                    <strong id="total-interest">$0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Total Return:</span>
                                    <strong id="total-return">$0.00</strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn  btn-block" style="background: #191970; color: white;">
                                <i class="fas fa-check-circle"></i> Confirm Investment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('amount').addEventListener('input', function() {
    const amount = parseFloat(this.value) || 0;
    console.log('Amount:', amount);  // Debugging line
    const interestRate = {{ $plan->interest_rate }};
    const duration = {{ $plan->duration_days }};

    const dailyProfit = amount * (interestRate / 100);
    const totalInterest = dailyProfit * duration;
    const totalReturn = amount + totalInterest;

    document.getElementById('daily-profit').textContent = '$' + dailyProfit.toFixed(2);
    document.getElementById('total-interest').textContent = '$' + totalInterest.toFixed(2);
    document.getElementById('total-return').textContent = '$' + totalReturn.toFixed(2);
});

</script>

@endsection
