<!-- resources/views/emails/deposit_received.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Received</title>
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
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .header {
            padding: 30px 20px;
            text-align: center;
            background-color: #ffffff;
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
            margin: 0 0 20px;
            font-weight: 600;
        }
        p {
            margin-bottom: 16px;
            font-size: 16px;
            color: #4a5568;
        }
        .welcome-features {
            margin: 25px 0;
        }
        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .feature-icon {
            margin-right: 12px;
            font-size: 18px;
            color: #4299e1;
        }
        .verification-steps {
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .verification-steps h3 {
            margin-top: 0;
            color: #2d3748;
            font-size: 18px;
        }
        ol {
            padding-left: 20px;
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
        .support-link {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="email-container">
        <div class="header">
            <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
</div>
    <h1 style="background:#191970; color:#fff; margin: auto">Deposit Received</h1>
    <p>Hello {{ $user->name }},</p>
    <p>We have received your deposit of ${{ number_format($deposit->amount, 2) }}. The transaction is currently pending approval.</p>

    <p><strong>Details:</strong></p>
    <p>Amount: ${{ number_format($deposit->amount, 2) }}</p>
    <p>Method: {{ $deposit->walletMethod->name }}</p>
    <p>Date: {{ $deposit->created_at->format('F j, Y \a\t g:i a') }}</p>

    <p>We will notify you once the deposit has been approved.</p>
    <p>Thanks.</p>

        <div class="footer">
            <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
            <p>
                <a href="{{ url('/privacy') }}" class=""style="color:#191970">Privacy Policy</a> |
                <a href="{{ url('/terms') }}" class=""style="color:#191970">Terms of Service</a>
            </p>
            <p>Need assistance? Email us at <a href="mailto:support@maxfund.net" class=""style="color:#191970">support@maxfund.net</a></p>
        </div>
</body>
</html>
