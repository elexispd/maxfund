@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Withdraws</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">All withdrawals</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Display success message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table
                          id="basic-datatables"
                          class="display table table-striped table-hover"
                        >
                          <thead>
                            <tr>
                              <th>SN</th>
                              <th>Network</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>Status</th>
                            </tr>
                          </thead>

                          <tbody>
                                @foreach ($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $withdrawal->wallet->walletMethod->name ." ". ($withdrawal->wallet->walletMethod->network) }}
                                    </td>
                                    <td>${{ number_format($withdrawal->amount, 2) }}</td>
                                    <td>{{ $withdrawal->created_at }}</td>
                                    <td>
                                        @if($withdrawal->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($withdrawal->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
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
    </div>
      </div>
    </div>
</div>


@endsection
