@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Withdraw</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <form action="{{ route('user.withdraw.store') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="email2">Wallet Address</label>
                        <select name="wallet_address" class="form-control" id="">
                            @foreach($wallets as $wallet)
                                <option value="{{ $wallet->id }}">
                                    {{ ucwords($wallet->currency) }} - [{{ $wallet->address }}]
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Amount</label>
                        <input
                          type="number"
                          class="form-control"
                          name="amount"
                        />
                        <label for="" class="text-info">
                            Minimum withdrawal is {{ Auth::user()->balance }}
                          </label>
                    </div>

                    <button class="btn btn-primary">Proceed withdraw</button>
                </form>

                <hr>

                <ul style="list-style:none;" type="none"><i class="fa fa-info-circle"></i>
                    <li> Withdrawal is instant but may take up to 5 minutes. </li>
                    <li>To cancel withdrawal request, send us notification to our official email info@maxfund.com or contact live support. </li>
                </ul>

              </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</div>


@endsection
