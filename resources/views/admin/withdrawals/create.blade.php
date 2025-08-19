@extends('layouts.userDashboard')

@section('content')
<div class="container">
    @if(session()->has('success'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="trues">X</button>

            {{session()->get('success')}}
        </div>

        @endif
    <h2>Withdraw from {{ $user->name }}'s Account</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.user.withdraw.store', $user->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="amount">Amount to Withdraw</label>
            <input type="number" name="amount" class="form-control" min="1" required>
        </div>
        <p style="color: #191970; margin-left: 1rem;">Balance: ${{$user->balance}} </p>
        <button type="submit" class="btn btn-danger">Withdraw</button>
    </form>
</div>

@endsection
