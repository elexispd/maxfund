@extends('layouts.userDashboard')

@section('content')
<style>
    .info-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        border-left: 4px solid #4e73df;
    }
    .section-title {
        font-size: 1.1rem;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 8px;
    }
    .info-item {
        padding: 5px 0;
    }
    .text-monospace {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 0.85em;
    }
</style>

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">User Information</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#"><i class="icon-home"></i></a>
            </li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="#">User Details</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        <h4 class="fw-bold">User Profile</h4>
                    </div>
                    <div>

                            <a class="btn  btn-sm" href="{{ route('admin.user.withdraw', $user->id) }}" style="background: #191970; color: #fff;">
                            <i class="fas fa-money-check-alt"></i> Debit
                        </a>
                        <a class="btn  btn-sm" href="{{ route('admin.user.deposit', $user->id) }}" style="background: #191970; color: #fff;">
                            <i class="fas fa-money-check-alt"></i> Credit </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit', $user->id) }}">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>

                        <form action="{{ route('admin.user.change-status', $user->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'inactive' : 'active' }}">
                            <button type="submit" class="btn btn-{{ $user->status === 'active' ? 'danger' : 'success' }} btn-sm">
                                <i class="fas fa-{{ $user->status === 'active' ? 'ban' : 'check' }} mr-1"></i>
                                {{ $user->status === 'active' ? 'Disable' : 'Enable' }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Personal Information Column -->
                        <div class="col-md-6">
                            <div class="info-section mb-4">
                                <h5 class="section-title fw-bold text-primary mb-3">
                                    <i class="fas fa-user-circle mr-2"></i>Personal Information
                                </h5>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Full Name:</div>
                                    <div class="col-sm-8">{{ $user->name }}</div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Email:</div>
                                    <div class="col-sm-8">{{ $user->email }}</div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Phone:</div>
                                    <div class="col-sm-8">{{ $user->phone ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Date of Birth:</div>
                                    <div class="col-sm-8">{{ $user->dob ?? 'N/A' }}</div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Location:</div>
                                    <div class="col-sm-8">
                                        {{ $user->city ? ucwords($user->city) . ', ' : '' }}{{ $user->country ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div class="info-section mb-4">
                                <h5 class="section-title fw-bold text-primary mb-3">
                                    <i class="fas fa-wallet mr-2"></i>Account Information
                                </h5>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Balance:</div>
                                    <div class="col-sm-8">${{ number_format($user->balance, 2) }}</div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Status:</div>
                                    <div class="col-sm-8">
                                        <span class="badge badge-{{ $user->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Joined Date:</div>
                                    <div class="col-sm-8">{{ $user->created_at->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Wallet & Referral Information Column -->
                        <div class="col-md-6">
                            <!-- Wallet Addresses -->
                            <div class="info-section mb-4">
                                <h5 class="section-title fw-bold text-primary mb-3">
                                    <i class="fas fa-coins mr-2"></i>Wallet Addresses
                                </h5>
                                @if($user->wallets && $user->wallets->isNotEmpty())
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Currency</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->wallets as $wallet)
                                                <tr>
                                                    <td class="text-uppercase">{{ $wallet->walletMethod->name }}</td>
                                                    <td class="text-monospace small">{{ $wallet->address }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-warning py-2">No wallet addresses found</div>
                                @endif
                            </div>

                            <!-- Referral Information -->
                            <div class="info-section">
                                <h5 class="section-title fw-bold text-primary mb-3">
                                    <i class="fas fa-users mr-2"></i>Referral Information
                                </h5>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Referral Code:</div>
                                    <div class="col-sm-8">
                                        <code>
                                            @if ($user->referral_code)
                                            {{ config('app.url') }}/register?ref={{ $user->referral_code }} </code>
                                            @else
                                            N/A
                                            @endif
                                        </code>
                                    </div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">Referred By:</div>
                                    <div class="col-sm-8">
                                        {{ $user->referred_by ? $user->referredBy->name : 'Organic registration' }}
                                    </div>
                                </div>
                                <div class="info-item row mb-2">
                                    <div class="col-sm-4 fw-bold">All Referrals:</div>
                                    <div class="col-sm-8">
                                        <a href="{{ route('admin.referral.index', $user) }}" class="badge badge-secondary">Check</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit User Information</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" value="{{ $user->country }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection



