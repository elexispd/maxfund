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
          <a href="#">Create</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Transfer From Balance</div>
            <span class="badge badge-primary">Your Balance Is: {{ auth()->user()->balance }}</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <form action="{{ route('transfer.create') }}" method="post">
                    @csrf
                   @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif



                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-3"></i>
                                <div class="text-danger">
                                    {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="email2">Recipient</label>
                            <select name="receiver_id" class="form-control">
                                <option selected disabled value="">Select Recipient</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Amount</label>
                            <input type="number" class="form-control" name="amount">
                        </div>

                    <button class="btn btn-primary">Transfer</button>
                </form>


              </div>

        </div>
      </div>
    </div>
      </div>
    </div>
</div>


@endsection
