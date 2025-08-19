<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Daily Interest Notification – MaxFund</title>
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
        h3 {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 16px;
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
        .details {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin: 24px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        .detail-label {
            font-weight: 600;
            color: #4a5568;
        }
        .detail-value {
            color: #2d3748;
            text-align: right;
        }
        .button-container {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            flex-wrap: wrap;
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
            text-align: center;
            flex-grow: 1;
        }
        .button-secondary {
            background-color: #e2e8f0;
            color: #2d3748 !important;
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
        .highlight {
            color: #2b6cb0;
            font-weight: 600;
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
            <h1>Your Daily Interest Has Been Credited</h1>

            <p>Hello <span class="highlight">{{ $notifiable->name }}</span>,</p>

            <p>We're pleased to inform you that your daily investment interest of <span class="highlight">${{ number_format($dailyInterest, 2) }}</span> has been successfully credited to your account.</p>
    
            <div class="details">
                <h3 style="color:#191970">Investment Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Plan: </span>
                    <span class="detail-value" style="color:#191970 !important">{{ $investment->plan->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Investment Amount:</span>
                    <span class="detail-value">${{ number_format($investment->amount, 2) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Today's Interest: </span>
                    <span class="detail-value">${{ number_format($dailyInterest, 2) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Interest Earned: </span>
                    <span class="detail-value">${{ number_format($totalInterestPaid, 2) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date Credited: </span>
                    <span class="detail-value">{{ $currentDate }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Days Remaining: </span>
                    <span class="detail-value"> {{ floor(Carbon\Carbon::now()->diffInDays($investment->end_date)) }} days</span>
                </div>
            </div>
    
            <div class="button-container">
                <a href="{{ url('/investments') }}" class="button" style="background:#191970; color:#fff">View My Investments</a>
                <a href="mailto:support@maxfund.net" class="button button-secondary">Contact Support</a>
            </div>

            <p style="margin-top: 24px;">Thank you for investing with MaxFund. We appreciate your trust in us.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} MaxFund. All rights reserved.</p>
            <p>Need help? Email us at <a href="mailto:support@maxfund.net">support@maxfund.net</a></p>
            <p style="margin-top: 12px; font-size: 12px;">
                This is an automated message. Please do not reply directly to this email.
            </p>
        </div>
    </div>
</body>
</html>