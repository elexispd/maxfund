@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Complete Your KYC Verification</h4>
                    <p class="text-muted">Please provide your complete details for account verification</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.kyc.store') }}" method="POST">
                        @csrf

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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">Date Of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                           id="state" name="dob"
                                           value="{{ old('dob', auth()->user()->dob) }}" required>
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">State/Province</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror"
                                           id="state" name="state"
                                           value="{{ old('state', auth()->user()->state) }}" required>
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip">ZIP/Postal Code</label>
                                    <input type="text" class="form-control @error('zip') is-invalid @enderror"
                                           id="zip" name="zip"
                                           value="{{ old('zip', auth()->user()->zip) }}" required>
                                    @error('zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Submit KYC Information
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
