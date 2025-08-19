@extends('layouts.userDashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">KYC Verification Details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>User Information</h4>
                <p><strong>Name:</strong> {{ $kyc->user->name }}</p>
                <p><strong>Email:</strong> {{ $kyc->user->email }}</p>
                <p><strong>DOB:</strong> {{ $kyc->dob}}</p>
                <p><strong>State:</strong> {{ $kyc->state }}</p>
                <p><strong>ZIP:</strong> {{ $kyc->zip }}</p>
            </div>

            <div class="col-md-6">
                <h4>Document Information</h4>
                <p><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $kyc->document_type)) }}</p>
                <p><strong>ID Number:</strong> {{ $kyc->id_number }}</p>
                <p><strong>Status:</strong>
                    <span class="badge badge-{{
                        $kyc->status === 'approved' ? 'success' :
                        ($kyc->status === 'rejected' ? 'danger' : 'warning')
                    }}">
                        {{ ucfirst($kyc->status) }}
                    </span>
                </p>

                @if($kyc->status === 'rejected')
                <p><strong>Rejection Reason:</strong> {{ $kyc->rejection_reason }}</p>
                @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Document Front</h4>
                <img src="{{ asset('storage/'.$kyc->document_front) }}"
                     alt="Document Front" class="img-fluid border">
            </div>

            @if($kyc->document_back)
            <div class="col-md-6">
                <h4>Document Back</h4>
                <img src="{{ asset('storage/'.$kyc->document_back) }}"
                     alt="Document Back" class="img-fluid border">
            </div>
            @endif
        </div>

        @if($kyc->status === 'pending')
        <div class="row mt-4">
            <div class="col-md-6">
                <form action="{{ route('admin.kyc.approve', $kyc) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn  btn-block" style="background:#191970">
                        Approve KYC
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.kyc.reject', $kyc) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="reason" class="form-control"
                               placeholder="Rejection reason" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">
                                Reject
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
