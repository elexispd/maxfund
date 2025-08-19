<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .details { background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #6c757d;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
    </style>
</head>
<body>

   

    <div class="header">
            <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
        </div>

        <h2 style="text-align:center; background:#191970; color: #fff">MaxFund Investment Completed</h2>

    <div class="content">
        <p>Hello {{ $notifiable->name }},</p>

        <p>We're pleased to inform you that your investment has matured and has been successfully completed.</p>

        <div class="details">
            <h3 style="margin-top: 0;">Investment Details</h3>
            <p><strong>Plan:</strong> {{ $investment->plan->name }}</p>
            <p><strong>Amount:</strong> ${{ number_format($investment->amount, 2) }}</p>
            <p><strong>Profit:</strong> ${{ number_format($profit, 2) }}</p>
            <p><strong>Total Payout:</strong> ${{ number_format($totalPayout, 2) }}</p>
            <p><strong>Completion Date:</strong> {{ $currentDate }}</p>
        </div>

        <a href="{{ url('/investments') }}" class="button">View My Investments</a>

        <div class="footer">
            <p>If you have any questions, please contact our support team at <a href="mailto:support@maxfund.net" style="color: #191970;">support@maxfund.net</a>.</p>
            <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
