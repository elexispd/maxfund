@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Deposit</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">All Deposits</h4>
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
                              <th>Payment Method</th>
                              <th>Amount</th>
                              <th>Status</th>
                            </tr>
                          </thead>

                          <tbody>
                                @foreach ($deposits as $deposit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $deposit->walletMethod->name }}
                                        @if($deposit->walletMethod->network)
                                            ({{ $deposit->walletMethod->network }})
                                        @endif
                                    </td>
                                    <td>${{ number_format($deposit->amount, 2) }}</td>
                                    <td>
                                        @if($deposit->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($deposit->status === 'rejected')
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
