<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Account Status Notification – MaxFund</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f1f5f9;
            color: #2d3748;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .email-container {
            max-width: 620px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .header {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 30px 20px;
            text-align: center;
        }
        .logo {
            max-height: 48px;
        }
        .content {
            padding: 32px 28px;
        }
        h1 {
            font-size: 22px;
            color: #1a202c;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 20px;
        }
        p {
            font-size: 15px;
            color: #4a5568;
            margin: 0 0 16px 0;
        }
        .status-badge {
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 20px;
            margin-bottom: 24px;
        }
        .status-disabled {
            background-color: #fff5f5;
            color: #c53030;
        }
        .status-enabled {
            background-color: #fff5f5;
            color: #29812b;
        }
        .status-active {
            background-color: #f0fff4;
            color: #2f855a;
        }
        .reason-box {
            background-color: #edf2f7;
            border-left: 4px solid #a0aec0;
            padding: 16px;
            margin: 20px 0;
            border-radius: 6px;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            background-color: #2b6cb0;
            color: #ffffff !important;
            padding: 12px 28px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 24px;
        }
        .footer {
            background-color: #f7fafc;
            text-align: center;
            padding: 24px 20px;
            font-size: 13px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }
        .footer a {
            color: #3182ce;
            text-decoration: none;
            margin: 0 6px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
           <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
        </div>
        <div class="content">
            <h1>Account Status Notification</h1>

            <div class="status-badge status-{{ $status }}">
                {{ strtoupper($status) }}
            </div>

            <p>Dear {{ $notifiable->name }},</p>

            @if($status === 'disabled')
                <p>We regret to inform you that your MaxFund account has been <strong>disabled</strong> effective immediately. As a result, you will not be able to access your account or initiate any transactions until further notice.</p>

                @if($reason)
                <div class="reason-box">
                    <strong>Reason for Deactivation:</strong>
                    <p>{{ $reason }}</p>
                </div>
                @endif

                <p>If you believe this action was taken in error or require further assistance, please reach out to our support team using the link below.</p>
            @else
                <p>We are pleased to inform you that your MaxFund account has been <strong>reactivated</strong>. You now have full access to your dashboard and all available services.</p>
            @endif

            <a href="mailto:support@maxfund.net" class="button">Contact Support</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} MaxFund. All rights reserved.</p>

            <p>Need help? Email us at <a href="mailto:support@maxfund.net">support@maxfund.net</a></p>
        </div>
    </div>
</body>
</html>
