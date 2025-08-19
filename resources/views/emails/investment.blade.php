<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Investment Successful</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center;">
    <div style="margin-bottom: 20px;">
        <img src="{{ url('assets/img/newlogo.jpg') }}" alt="MaxFund Logo" style="width: 90px; height: 90px; border-radius: 50%;">
    </div>

    <h1>Hello {{ $user->name }},</h1>

    <p>You have successfully invested <strong>${{ number_format($investment->amount, 2) }}</strong>
        in the <strong>{{ $investment->plan->name }}</strong> plan.</p>

    <p>Your expected profit is <strong>${{ number_format($investment->expected_profit, 2) }}</strong>
        over <strong>{{ $investment->plan->duration_days }}</strong> days.</p>

    <p>We appreciate your trust in MaxFund!</p>

    <p>
        <a href="{{ route('user.investment.index') }}" style="background-color: #191970; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">View My Investments</a>
    </p>

    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
