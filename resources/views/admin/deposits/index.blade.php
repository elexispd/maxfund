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
                                Pending deposits appear here
                                @break
                            @case('approved')
                                Approved deposits appear here
                                @break
                            @case('rejected')
                                Rejected deposits appear here
                                @break
                            @default
                                All deposits appear here
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
                                        <th>Proof</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $deposit->user->name }}</td>
                                        <td>${{ number_format($deposit->amount, 2) }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' .  $deposit->screenshot_path ) }}" target="_blank" data-lightbox="image-1">
                                                <img src="{{ asset('storage/' .  $deposit->screenshot_path ) }}" width="70" alt="">
                                            </a>
                                        </td>
                                        <td>{{ $deposit->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($deposit->status == 'pending')
                                               <span class="badge badge-warning">Pending</span
                                            @elseif($deposit->status == 'approved')
                                              <span class="badge " style="color:#191970">Approved</span
                                            @else
                                                <span class="badge badge-danger">Rejected</span
                                            @endif
                                        </td>
                                        <td>
                                            @if($deposit->status != 'approved')
                                            <form action="{{ route('admin.deposits.approve', $deposit) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm" style="background:#191970; color:#fff">Approve</button>
                                            </form>
                                            @else
                                            <span class="badge badge-secondary">Updated: {{ $deposit->updated_at->format('M d, Y H:i')  }}</span>
                                            @endif

                                            @if($deposit->status != 'rejected')
                                            <form action="{{ route('admin.deposits.reject', $deposit) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                            @else
                                            <span class="badge badge-secondary">Updated: {{ $deposit->updated_at->format('M d, Y H:i')  }}</span>
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
