<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Feedback Received</title>
    <style>
        body { font-family: 'Outfit', 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8faf9; margin: 0; padding: 0; color: #1e293b; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8faf9; padding: 20px 0 40px 0; }
        .main { background-color: #ffffff; margin: 0 auto; width: 600px; border-spacing: 0; color: #1e293b; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .header { background-color: #002800; padding: 40px 20px; text-align: center; border-radius: 16px 16px 0 0; }
        .logo { width: 220px; height: auto; display: inline-block; }
        .content { padding: 40px; text-align: left; }
        .title { font-size: 26px; font-weight: 800; color: #004800; margin-top: 0; margin-bottom: 10px; text-align: center; }
        .subtitle { font-size: 16px; color: #64748b; margin-bottom: 30px; text-align: center; line-height: 1.5; }
        .feedback-card { background-color: #fdfcf8; border: 1px solid #e2e8f0; border-left: 5px solid #c5a059; padding: 30px; border-radius: 12px; margin-bottom: 30px; }
        .detail-row { margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px; }
        .detail-row:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .label { font-weight: 700; color: #002800; font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 6px; }
        .value { font-size: 16px; color: #1e293b; }
        .rating { color: #f59e0b; font-weight: 800; }
        .button-container { text-align: center; padding-top: 10px; }
        .button { display: inline-block; padding: 16px 30px; background-color: #004800; color: #ffffff !important; text-decoration: none; border-radius: 12px; font-weight: 700; font-size: 15px; }
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
                    <h1 class="title">New Feedback Received</h1>
                    <p class="subtitle">Hello Admin, a new feedback has been submitted on the website. Here are the details:</p>
                    
                    <div class="feedback-card">
                        <div class="detail-row">
                            <span class="label">Name</span>
                            <span class="value">{{ $feedback->name }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Email</span>
                            <span class="value">{{ $feedback->email }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Mobile</span>
                            <span class="value">{{ $feedback->mobile }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Rating</span>
                            <span class="value rating">{{ $feedback->rating }} / 5 Stars</span>
                        </div>
                        <div class="detail-row">
                            <span class="label">Message</span>
                            <span class="value" style="font-style: italic; color: #475569; line-height: 1.6;">"{{ $feedback->message }}"</span>
                        </div>
                    </div>

                    <div class="button-container">
                        <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="button">View & Respond to Feedback</a>
                    </div>
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


