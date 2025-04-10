@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Investments</h4>
                    <p class="text-muted mb-0">All your active and completed investments</p>
                </div>
                <div class="card-body">
                    @if($referrals->isEmpty())
                        <div class="alert alert-info">
                            You haven't made any referrals yet.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                        <td>{{ $referral->created_at }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $investments->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
