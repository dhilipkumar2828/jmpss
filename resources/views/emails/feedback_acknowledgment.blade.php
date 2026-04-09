<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Feedback</title>
    <style>
        body { font-family: 'Outfit', 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8faf9; margin: 0; padding: 0; color: #1e293b; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8faf9; padding: 20px 0 40px 0; }
        .main { background-color: #ffffff; margin: 0 auto; width: 600px; border-spacing: 0; color: #1e293b; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .header { background-color: #002800; padding: 40px 20px; text-align: center; border-radius: 16px 16px 0 0; }
        .logo { width: 220px; height: auto; display: inline-block; }
        .content { padding: 40px; text-align: left; }
        .title { font-size: 26px; font-weight: 800; color: #004800; margin-top: 0; margin-bottom: 20px; text-align: center; }
        .subtitle { font-size: 16px; line-height: 1.6; color: #475569; margin-bottom: 30px; text-align: center; }
        .feedback_summary { background-color: #fdfcf8; border: 1px solid #e2e8f0; border-left: 5px solid #c5a059; padding: 30px; border-radius: 12px; margin-bottom: 30px; }
        .label { font-weight: 700; color: #002800; font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 6px; }
        .value { font-size: 16px; color: #1e293b; line-height: 1.5; }
        .rating { color: #f59e0b; font-weight: 800; }
        .footer { text-align: center; padding: 30px 20px; font-size: 13px; color: #64748b; }
        .footer-logo { font-weight: 800; color: #002800; margin-bottom: 8px; display: block; font-size: 14px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main" align="center" width="600" cellpadding="0" cellspacing="0">
            <tr>
                <td class="header">
                    <img src="{{ $message->embed(public_path('assets/jmpsss/image/logo.png')) }}" alt="JMPSS School Logo" class="logo">
                </td>
            </tr>
            <tr>
                <td class="content">
                    <h1 class="title">Thank You for Your Feedback!</h1>
                    <p class="subtitle">Dear {{ $feedback->name }},<br><br>Thank you for taking the time to share your experience with us. Your feedback is invaluable and helps us improve our educational excellence.</p>
                    
                    <div class="feedback_summary">
                        <span class="label">Your Feedback Summary</span>
                        <p class="value" style="margin: 10px 0;"><strong>Rating:</strong> <span class="rating">{{ $feedback->rating }} / 5 Stars</span></p>
                        <p class="value" style="font-style: italic; color: #64748b;">"{{ $feedback->message }}"</p>
                    </div>

                    <p class="subtitle" style="margin-bottom: 0;">We have received your feedback and our team will review it shortly. We appreciate your continued support.</p>
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <span class="footer-logo">JEEVA MEMORIAL PUBLIC SCHOOL</span>
                    <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>


