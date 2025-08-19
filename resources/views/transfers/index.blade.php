@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Transfer</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Transfer</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">History</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        @php
            $userId = Auth::id();
        @endphp

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">My Transfers</h4>
            </div>
            <div class="card-body">

                <table class="table table-bordered" id="basic-datatables">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Counterparty</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transfers as $transfer)
                            @if($transfer->sender_id === $userId)
                                {{-- Current user is sender --}}
                                <tr class="table-danger">
                                    <td><strong>Sent</strong></td>
                                    <td>{{ $transfer->receiver->name }}</td>
                                    <td>- ${{ number_format($transfer->amount, 2) }}</td>
                                    <td>{{ $transfer->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @elseif($transfer->receiver_id === $userId)
                                {{-- Current user is receiver --}}
                                <tr class="table-success">
                                    <td><strong>Received</strong></td>
                                    <td>{{ $transfer->sender->name }}</td>
                                    <td>+ ${{ number_format($transfer->amount, 2) }}</td>
                                    <td>{{ $transfer->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No transfers yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

      </div>
    </div>
      </div>
    </div>
</div>


@endsection
