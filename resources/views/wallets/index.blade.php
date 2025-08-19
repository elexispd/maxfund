@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">View Wallet</h3>
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
          <a href="#">Wallet</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Wallet Form</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">View Your Wallet</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Basic</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
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
                              <th>Address</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($wallets as $wallet)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $wallet->walletMethod->name . " " . $wallet->walletMethod->network }}</td>
                                <td>{{ $wallet->address }}</td>
                                <td>
                                    <form action="{{ route('user.wallet.destroy', $wallet->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
