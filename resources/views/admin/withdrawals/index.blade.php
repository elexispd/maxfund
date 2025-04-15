@extends('layouts.userDashboard')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <p class="text-muted mb-0">
                        @switch($status)
                            @case('pending')
                                Pending $withdraws appear here
                                @break
                            @case('approved')
                                Approved $withdraws appear here
                                @break
                            @case('rejected')
                                Rejected $withdraws appear here
                                @break
                            @default
                                All $withdraws appear here
                        @endswitch
                    </p>
                </div>
                <div class="card-body">


                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Wallet Address</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($withdraws as $withdraw)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $withdraw->user->name }}</td>
                                        <td>${{ number_format($withdraw->amount, 2) }}</td>
                                        <td>

                                            {{ ucwords($withdraw->wallet->currency) ?? 'N/A' }}
                                        </td>
                                        <td>{{ $withdraw->wallet->address }}</td>
                                        <td>{{ $withdraw->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($withdraw->status == 'pending')
                                               <span class="badge badge-warning">Pending</span
                                            @elseif($withdraw->status == 'approved')
                                              <span class="badge badge-success">Approved</span
                                            @else
                                                <span class="badge badge-danger">Rejected</span
                                            @endif
                                        </td>
                                        <td>
                                            @if($withdraw->status != 'approved')
                                            <form action="{{ route('admin.withdraw.approve', $withdraw) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>
                                            @else
                                            <span class="badge badge-secondary">Updated: {{ $withdraw->updated_at->format('M d, Y H:i')  }}</span>
                                            @endif

                                            @if($withdraw->status != 'rejected')
                                            <form action="{{ route('admin.withdraw.reject', $withdraw) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                            </form>
                                            @else
                                            <span class="badge badge-secondary">Updated: {{ $withdraw->updated_at->format('M d, Y H:i')  }}</span>
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
