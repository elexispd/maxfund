@extends('layouts.userDashboard')

@section('content')


<div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Make Deposit</h3>
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
          <a href="#">Deposit</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Deposit Form</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Make Deposit</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <form action="{{ route('user.deposit.store') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email2">Payment Method</label>
                        <select name="currency" class="form-control" id="">
                            @foreach($walletMethods as $method)
                                <option value="{{ $method->code }}"
                                    @if(old('currency') == $method->code) selected @endif>
                                    {{ $method->name }}
                                    @if($method->network) ({{ $method->network }}) @endif
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
                        <label for="" class="" style="color: #191970; font-weight:bold;">
                            Min $50.00
                          </label>
                      </div>

                      <button class="btn" style="background: #191970; color: white;">Proceed</button>
                </form>


              </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</div>


@endsection
