@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Referrals</h4>
                    <p class="text-muted mb-0">All your referrals appear here</p>
                </div>
                <div class="card-body">
                    @if(auth()->user()->referrals()->count() === 0)
                        <div class="alert alert-info">
                            You haven't made any referrals yet.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referrals as $referral)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $referral->name }}</td>
                                        <td>{{ $referral->created_at->format('M d, Y H:i') }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
