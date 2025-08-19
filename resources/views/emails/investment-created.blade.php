
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
          .logo {
            max-width: 180px;
            height: auto;
        }
    </style>
</head>
<body>
   

    <div class="header">
            <img src="{{ asset('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" class="" 
            style="width: 90px; border-radius: 50%; height: 90px; "
        </div>

         <h2 style="text-align: center">MaxFund Investment Confirmation</h2>

    <div class="content">
        <p>Hello {{ $notifiable->name }},</p>

        <p>Thank you for creating a new investment with MaxFund. Here are the details of your investment:</p>

        <div class="details">
            <h3 style="margin-top: 0;">Investment Details</h3>
            <p><strong>Plan:</strong> {{ $plan->name }}</p>
            <p><strong>Amount Invested:</strong> ${{ number_format($investment->amount, 2) }}</p>
            <p><strong>Expected Profit:</strong> ${{ number_format($investment->expected_profit, 2) }}</p>
            <p><strong>Total Expected Return:</strong> ${{ number_format($investment->amount + $investment->expected_profit, 2) }}</p>
            <p><strong>Start Date:</strong> {{ $currentDate }}</p>
            <p><strong>Maturity Date:</strong> {{ $maturityDate }}</p>
            <p><strong>Duration:</strong> {{ $plan->duration_days }} days</p>
            <p><strong>Daily Interest Rate:</strong> {{ number_format($plan->interest_rate, 2) }}%</p>
        </div>

        <a href="" class="button" style="background:#191970; color:#fff">View My Investments</a>

        <div class="footer">
            <p>If you have any questions, please contact our support team at <a href="mailto:support@maxfund.net" style="color: #191970;">support@maxfund.net</a>.</p>
            <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
        </div>
    </div>






    


</script>
</body>
</html>