<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit {{ ucfirst($status) }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .logo {
            max-width: 180px;
            height: auto;
        }
        .content {
            padding: 25px 20px;
        }
        h1 {
            color: #2d3748;
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .approved {
            background-color: #e6fffa;
            color: #065f46;
        }
        .rejected {
            background-color: #fff5f5;
            color: #9b2c2c;
        }
        .details {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }
        .details-item {
            display: flex;
            margin-bottom: 8px;
        }
        .details-label {
            font-weight: bold;
            min-width: 120px;
            color: #4a5568;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4299e1;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 20px 0;
        }
        .button.rejected {
            background-color: #e53e3e;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
        }
        .support {
            margin-top: 25px;
            color: #4a5568;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
        </div>

        <div class="content">
            <h1>Deposit {{ ucfirst($status) }}</h1>

            <div class=" {{ $status }}" style="background:#191970; color:#fff">
                {{ strtoupper($status) }}
            </div>

            <p>Dear {{ $user->name }},</p>

            @if($status === 'approved')
                <p>Your transaction has been successfully updated.</p>
                <p>Description: {{ $deposit->walletMethod->name }} deposit.</p>
                <p>Amount: ${{$deposit->amount}}.</p>
                <p>Status: <span style="color:191970"> Successful </span> </p>
            @else
                <p>We regret to inform you that your deposit request could not be processed.</p>
                @if($reason)
                    <p><strong>Reason:</strong> {{ $reason }}</p>
                @endif
            @endif

            <div class="details">
                <div class="details-item">
                    <span class="details-label">Amount:</span>
                    <span>${{ number_format($deposit->amount, 2) }}</span>
                </div>
                <div class="details-item">
                    <span class="details-label">Date:</span>
                    <span>{{ $deposit->created_at->format('F j, Y \a\t g:i a') }}</span>
                </div>
                <div class="details-item">
                    <span class="details-label">Payment Method:</span>
                    <span>{{ $deposit->walletMethod->name }}</span>
                </div>
                @if($status === 'approved')
                <div class="details-item">
                    <span class="details-label">New Balance:</span>
                    <span>${{ number_format($user->balance, 2) }}</span>
                </div>
                @endif
            </div>

            <a href="{{ url('/dashboard') }}" class="button {{ $status === 'rejected' ? 'rejected' : '' }}" style="background:#191970; color:#fff">
                View Dashboard
            </a>

            <div class="support">
                <p>If you have any questions or need assistance, please don't hesitate to contact our 
                support team at <a href="mailto:support@maxfund.net" style="color:#191970">support@maxfund.net</a>.</p>
                <p>Thank you for choosing our service.</p>
            </div>
        </div>

        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
            <small>This is an automated message. Please do not reply directly to this email.</small>
        </div>
    </div>
</body>
</html>
