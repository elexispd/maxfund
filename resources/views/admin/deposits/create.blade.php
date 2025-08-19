@extends('layouts.userDashboard')

@section('content')
<div class="container">
    @if(session()->has('success'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="trues">X</button>

        {{session()->get('success')}}
    </div>

    @endif
    <h2>Deposit for {{ $user->name }}</h2>

    <form action="{{ route('admin.user.deposit.store', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="currency">Currency</label>
            <select name="currency" class="form-control">
                @foreach($user->wallets as $wallet)
                    <option value="{{ $wallet->currency }}">{{ ucfirst($wallet->currency) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" min="50" required>
        </div>
        <p style="color: #191970; margin-left: 1rem;">Balance: ${{$user->balance}} </p>

        <button type="submit" class="btn" style="background: #191970; color: #fff; margin-left: 1rem;;">Deposit</button>
    </form>
</div>
@endsection
