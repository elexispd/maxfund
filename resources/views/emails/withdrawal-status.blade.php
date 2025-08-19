<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .header {
            padding: 30px 20px;
            text-align: center;
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
        }
        .logo {
            max-height: 50px;
            width: auto;
        }
        .content {
            padding: 30px;
        }
        h1 {
            color: #1a365d;
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .status-approved {
            background-color: #f0fff4;
            color: #2f855a;
        }
        .status-processing {
            background-color: #ebf8ff;
            color: #2b6cb0;
        }
        .status-rejected {
            background-color: #fff5f5;
            color: #c53030;
        }
        .details {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 20px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            margin-bottom: 8px;
        }
        .detail-label {
            font-weight: 600;
            min-width: 150px;
            color: #4a5568;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4299e1;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 25px 0;
        }
        .footer {
            padding: 20px;
            text-align: center;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
            background-color: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="email-container">
       <div class="header">
    <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" 
    style="width: 130px; border-radius: 50%; height: 130px;" />
</div>

<div class="content">
    <h1>Withdrawal {{ ucfirst($status) }}</h1>

    <div class="text-center status-{{ $status }}" style="background:#191970; color:white; padding:0.5rem; text-align:center">
        {{ strtoupper($status) }}
    </div>

    <p>Dear {{ $notifiable->name }},</p>

    @if($status === 'approved')
        <p>Your transaction has been successfully updated.</p>
        <p>
            Description: ${{ number_format($withdrawal->amount, 2) }} withdrawal to {{ $withdrawal->wallet->currency }} wallet ({{ $withdrawal->wallet->address }})  
            <br>
            Amount: ${{ number_format($withdrawal->amount, 2) }}
            <br>
            Status: <span style="color:#191970; font-weight:bold;">Successful</span>
            <br><br>
            Thanks
        </p>
    @elseif($status === 'processing')
        <p>You have successfully placed a withdrawal request of ${{ number_format($withdrawal->amount, 2) }} 
        to your {{ $withdrawal->wallet->currency }} wallet ({{ $withdrawal->wallet->address }}).</p>
        <p>Please exercise patience while we process your transaction. 
        <br><br>Thanks
        </p>
    @else
        <p>We regret to inform you that your withdrawal request could not be processed.</p>
        @if($reason)
            <div class="details">
                <p><strong>Reason:</strong> {{ $reason }}</p>
            </div>
        @endif
        <p>Please review your withdrawal details and try again.
        <br><br>
        Status: <span style="background:#191970; color:white; padding:5px 10px; border-radius:4px;"> Declined </span>
        </p>
    @endif

    <div class="footer">
        <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
        <p>Need help? Contact our support team at 
        <a href="mailto:support@maxfund.net" style="color:#191970">support@maxfund.net</a></p>
    </div>
</div>

   
          



</body>
</html>
