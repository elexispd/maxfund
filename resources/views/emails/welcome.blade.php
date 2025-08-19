<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Welcome to MaxFund</title>
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

        <div class="content">
            <h1>Welcome to MaxFund, {{ $notifiable->name }}!</h1>

            <p>We're thrilled to have you on board. MaxFund is committed to providing you with the tools and insights needed to make smart, confident investment decisions.</p>

            <div class="welcome-features">
                <div class="feature">
                    <span class="" style="color:#191970">✔</span>
                    <span>Curated investment opportunities</span>
                </div>
                <div class="feature">
                    <span class="" style="color:#191970">✔</span>
                    <span>Real-time portfolio tracking</span>
                </div>
                <div class="feature">
                    <span class="" style="color:#191970">✔</span>
                    <span>Industry-grade security protocols</span>
                </div>
                <div class="feature">
                    <span class="" style="color:#191970">✔</span>
                    <span>Responsive, 24/7 customer support</span>
                </div>
            </div>

            <div class="verification-steps">
                <h3>Let’s Get You Started</h3>
                <p>To unlock the full MaxFund experience, please complete the following:</p>
                <ol>
                    <li>Verify your email address</li>
                    <li>Complete your profile details</li>
                    <li>Set up two-factor authentication</li>
                    <li>Explore available investment products</li>
                </ol>
            </div>

            <a href="{{ url('/dashboard') }}" class="button" style="background:#191970">Complete Your Profile</a>

            <p>If you have any questions, feel free to reach out to us anytime—we’re here to help!</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} MaxFund. All rights reserved.</p>
            <p>
                <a href="{{ url('/privacy') }}" class=""style="color:#191970">Privacy Policy</a> |
                <a href="{{ url('/terms') }}" class=""style="color:#191970">Terms of Service</a>
            </p>
            <p>Need assistance? Email us at <a href="mailto:support@maxfund.net" class=""style="color:#191970">support@maxfund.net</a></p>
        </div>
    </div>
</body>
</html>
