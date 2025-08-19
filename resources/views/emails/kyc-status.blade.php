<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KYC Verification Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #2d3748;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-height: 60px;
        }
        h1 {
            font-size: 22px;
            color: #2d3748;
        }
        p {
            line-height: 1.6;
            font-size: 15px;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin: 20px 0;
            font-size: 14px;
        }
        .status-approved {
            background-color: #e6fffa;
            color: #2c7a7b;
        }
        .status-rejected {
            background-color: #fff5f5;
            color: #c53030;
        }
        .document-list {
            margin-top: 20px;
        }
        .document-item {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .document-icon {
            color: #38a169;
            margin-right: 8px;
        }
        .reason-box {
            background-color: #fefcbf;
            padding: 15px;
            border-radius: 6px;
            margin: 15px 0;
            font-size: 14px;
        }
        ol {
            padding-left: 18px;
            margin-top: 10px;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #3182ce;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }
        .button:hover {
            background-color: #2b6cb0;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #718096;
            text-align: center;
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
            <h1>KYC Verification {{ ucfirst($status) }}</h1>

            <div class=" status-{{ $status }}" style="background:#191970; color:#fff">
                {{ strtoupper($status) }}
            </div>

            <p>Dear {{ $notifiable->name }},</p>

            @if($status === 'approved')
                <p>We're pleased to inform you that your Know Your Customer (KYC) verification has been <strong>successfully approved</strong>.</p>
                <p>You now have full access to MaxFund's financial services, including extended transaction limits and investment opportunities.</p>

                <div class="document-list">
                    <p><strong>Approved Documents:</strong></p>
                    <div class="document-item">
                        <span class="document-icon">✓</span> Government-issued ID
                    </div>
                    <div class="document-item">
                        <span class="document-icon">✓</span> Proof of Address
                    </div>
                </div>

                <p>We look forward to serving you with the highest level of financial support and services.</p>
            @else
                <p>After a careful review, we regret to inform you that your KYC verification has been <strong>declined</strong> at this time.</p>

                @if($reason)
                <div class="reason-box">
                    <p><strong>Reason for Rejection:</strong></p>
                    <p>{{ $reason }}</p>
                </div>
                @endif

                <p>To complete your verification, please:</p>
                <ol>
                    <li>Log in to your MaxFund account</li>
                    <li>Go to the “KYC” section</li>
                    <li>Upload clear and updated documents</li>
                    <li>Submit them for review</li>
                </ol>
            @endif

            <a href="{{ url('/kyc') }}" class="button">
                @if($status === 'approved')
                    Go to Dashboard
                @else
                    Resubmit Documents
                @endif
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} MaxFund. All rights reserved. | This is a system-generated email, please do not reply.
        </div>
    </div>
</body>
</html>
