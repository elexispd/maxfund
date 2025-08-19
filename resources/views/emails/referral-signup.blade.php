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
        .highlight-box {
            background-color: #f0fff4;
            border-left: 4px solid #48bb78;
            padding: 16px;
            margin: 20px 0;
            border-radius: 4px;
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
           <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
        </div>

        <div class="content">
            <h1>Great News! Your Friend Joined MaxFund</h1>

            <p>Dear {{ $referral->name }},</p>

            <p>We're excited to let you know that <strong>{{ $newUser->name }}</strong> just signed up using your referral link!</p>

           

            <p>Thank you for spreading the word about MaxFund and helping us grow our community of smart investors.</p>

            <p><strong>Keep referring!</strong></p>

            <p>Your unique referral link:</p>
            <a href="{{ $referralLink }}" class="button" style="background:#191970; color:white">Share Your Referral Link</a>

            <p>If you have any questions about our referral program, feel free to reach out to our support team.</p>
        </div>

        <div class="footer">
            <p>Happy Investing!</p>
            <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
            <p>Need help? Contact us at <a href="mailto:support@maxfund.net">support@maxfund.net</a></p>
        </div>
    </div>
</body>
</html>
