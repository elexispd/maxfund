@extends('layouts.userDashboard')
@section('content')
<div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Instructions</div>

                <div class="card-body">
                    <div class="alert alert-primary">
                        <h5>Deposit Amount: ${{ number_format($deposit->amount, 2) }}</h5>
                    </div>

                    <div class="text-center my-4">
                        <p>Scan this QR code with your wallet app:</p>
                        {!! $qrCode !!}

                        <div class="input-group mt-3">
                            <input type="text" class="form-control"
                                   value="{{ $adminWallet->address }}" id="walletAddress" readonly>
                            <button class="btn btn-outline-secondary" onclick="copyAddress()">
                                Copy Address
                            </button>
                        </div>
                    </div>

                    <div class="instructions mb-4">
                        <h5>Instructions:</h5>
                        <ol>
                            <li>Send exactly ${{ number_format($deposit->amount, 2) }} to the address above</li>
                            <li>After payment, upload your transaction proof below</li>
                            <li>Your deposit will be credited after verification</li>
                        </ol>
                    </div>

                    <form method="POST" action="{{ route('user.deposit.upload', $deposit) }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="screenshot" class="form-label">Transaction Proof</label>
                            <input type="file" class="form-control" accept=".png,.jpg,.jpeg" name="screenshot" required>
                            <small class="text-muted">Upload a screenshot of your transaction</small>
                        </div>

                        <button type="submit" class="btn btn-success">
                            Submit Proof
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyAddress() {
        const address = document.getElementById('walletAddress');
        address.select();
        document.execCommand('copy');
        alert('Wallet address copied to clipboard: ' + address.value);
    }
    </script>
@endsection
