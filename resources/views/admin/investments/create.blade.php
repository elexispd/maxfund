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
                    <h4 class="card-title">Create Investment Plan</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.investment.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Plan Name</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name', $plan->name ?? '') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="min_amount">Minimum Amount (USD)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                    step="0.01"
                                    class="form-control @error('min_amount') is-invalid @enderror"
                                    id="min_amount"
                                    name="min_amount"
                                    value="{{ old('min_amount', $plan->min_amount ?? '') }}"
                                    required>
                                @error('min_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="max_amount">Maximum Amount (USD)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                    step="0.01"
                                    class="form-control @error('max_amount') is-invalid @enderror"
                                    id="max_amount"
                                    name="max_amount"
                                    value="{{ old('max_amount', $plan->max_amount ?? '') }}"
                                    required>
                                @error('max_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="interest_rate">Interest Rate (%)</label>
                            <input type="number"
                                step="0.01"
                                class="form-control @error('interest_rate') is-invalid @enderror"
                                id="interest_rate"
                                name="interest_rate"
                                value="{{ old('interest_rate', $plan->interest_rate ?? '') }}"
                                required>
                            @error('interest_rate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="duration_days">Duration (Days)</label>
                            <input type="number"
                                class="form-control @error('duration_days') is-invalid @enderror"
                                id="duration_days"
                                name="duration_days"
                                value="{{ old('duration_days', $plan->duration_days ?? '') }}"
                                required>
                            @error('duration_days')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn  btn-block" style="background: #191970; color: white;">
                                <i class="fas fa-check-circle"></i> Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
