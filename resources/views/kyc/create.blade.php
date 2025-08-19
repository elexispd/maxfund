@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">KYC Verification Status</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif


                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if($latestKyc)
                        @if($latestKyc->status === 'approved')
                            <div class="alert alert-success">
                                <div class="d-flex align-items-center">
                                    <div class="alert-icon">
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                    <div class="alert-text ml-3">
                                        <h4 class="alert-heading">KYC Approved!</h4>
                                        <p>Your KYC verification was approved on {{ $latestKyc->updated_at->format('M d, Y') }}.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="kyc-details">
                                <h5 class="mb-3">Your KYC Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Document Type</label>
                                            <input type="text" class="form-control-plaintext"
                                                   value="{{ ucfirst(str_replace('_', ' ', $latestKyc->document_type)) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ID Number</label>
                                            <input type="text" class="form-control-plaintext"
                                                   value="{{ $latestKyc->id_number }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Document Front</label>
                                            <div>
                                                <img src="{{ asset('storage/'.$latestKyc->document_front) }}"
                                                     class="img-thumbnail" style="max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                    @if($latestKyc->document_back)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Document Back</label>
                                            <div>
                                                <img src="{{ asset('storage/'.$latestKyc->document_back) }}"
                                                     class="img-thumbnail" style="max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control-plaintext"
                                                   value="{{ $latestKyc->dob }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State/Province</label>
                                            <input type="text" class="form-control-plaintext"
                                                   value="{{ $latestKyc->state }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ZIP/Postal Code</label>
                                            <input type="text" class="form-control-plaintext"
                                                   value="{{ $latestKyc->zip }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @elseif($latestKyc->status === 'pending')
                            {{-- Pending KYC view remains the same --}}
                            <div class="alert alert-warning">
                                <div class="d-flex align-items-center">
                                    <div class="alert-icon">
                                        <i class="fas fa-clock fa-2x"></i>
                                    </div>
                                    <div class="alert-text ml-3">
                                        <h4 class="alert-heading">KYC Under Review</h4>
                                        <p>We received your KYC submission on {{ $latestKyc->created_at->format('M d, Y') }}.</p>
                                        <p class="mb-0">Our team is reviewing your documents. This typically takes 1-3 business days.</p>
                                    </div>
                                </div>
                            </div>
                        @elseif($latestKyc->status === 'rejected')
                            {{-- Rejected KYC view remains the same --}}
                            <div class="alert alert-danger">
                                <div class="d-flex align-items-center">
                                    <div class="alert-icon">
                                        <i class="fas fa-exclamation-circle fa-2x"></i>
                                    </div>
                                    <div class="alert-text ml-3">
                                        <h4 class="alert-heading">KYC Rejected</h4>
                                        <p>Your KYC submission was rejected on {{ $latestKyc->updated_at->format('M d, Y') }}.</p>
                                        <p><strong>Reason:</strong> {{ $latestKyc->rejection_reason }}</p>
                                        <p class="mb-3">Please correct the issues and resubmit your KYC information.</p>
                                        <button class="btn btn-primary" onclick="showKYCForm()">Resubmit KYC</button>
                                    </div>
                                </div>
                            </div>
                            <div id="kycForm" style="display: none;">
                                @include('kyc.partials.form', ['latestKyc' => $latestKyc, 'user' => $user])
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info">
                            <div class="d-flex align-items-center">
                                <div class="alert-icon">
                                    <i class="fas fa-info-circle fa-2x"></i>
                                </div>
                                <div class="alert-text ml-3">
                                    <h4 class="alert-heading">Complete Your KYC Verification</h4>
                                    <p>Please provide your complete details for account verification.</p>
                                </div>
                            </div>
                        </div>
                        {{-- Show form immediately since no KYC exists --}}
                        @include('kyc.partials.form', ['latestKyc' => null, 'user' => $user])
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>

@if($latestKyc && $latestKyc->status === 'rejected')
<script>
    function showKYCForm() {
        document.getElementById('kycForm').style.display = 'block';
    }
</script>
@endif

@endsection
