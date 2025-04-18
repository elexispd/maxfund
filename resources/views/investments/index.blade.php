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
                    @if($investments->count() == 0)
                        <div class="alert alert-info">
                            You haven't made any investments yet.
                            <a href="{{ route('user.investment.plan') }}" class="alert-link">
                                Browse investment plans
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Expected Profit</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $investment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $investment->plan->name }}</td>
                                        <td>${{ number_format($investment->amount, 2) }}</td>
                                        <td>${{ number_format($investment->expected_profit, 2) }}</td>
                                        <td>
                                            @if($investment->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-primary">Completed</span>
                                            @endif
                                        </td>
                                        <td>{{ $investment->start_date }}</td>
                                        <td>{{ $investment->end_date }}</td>

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

<style>
    .badge-success {
        background-color: #28a745;
        color: white;
    }
    .badge-primary {
        background-color: #007bff;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
@endsection
