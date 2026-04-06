<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f4f7f6; }
        .email-container { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #e1e8ed; }
        .header { background-color: #004800; padding: 30px 20px; text-align: center; }
        .logo { max-width: 250px; height: auto; background: white; padding: 10px; border-radius: 5px; }
        .content { padding: 40px 30px; }
        .content h2 { color: #004800; border-bottom: 2px solid #e14c1e; padding-bottom: 10px; margin-top: 0; }
        .message-box { background-color: #f9fafb; border-left: 4px solid #004800; padding: 20px; margin: 25px 0; color: #4b5563; font-style: italic; }
        .footer { background-color: #f1f5f9; padding: 20px; text-align: center; color: #64748b; font-size: 12px; border-top: 1px solid #e2e8f0; }
        .button { display: inline-block; padding: 12px 25px; background-color: #e14c1e; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="{{ $message->embed(public_path('assets/jmpsss/logo.png')) }}" alt="Jeeva Memorial Public School" class="logo">
        </div>
        <div class="content">
            <h2>{{ $subject }}</h2>
            <p>Dear <strong>{{ $name }}</strong>,</p>
            
            <div class="message-box">
                {!! $messageBody !!}
            </div>

            <p style="margin-top: 25px;">Please contact the school office for any further information.</p>
            <a href="{{ url('/') }}" class="button">Visit Our Website</a>
        </div>
        <div class="footer">
            <p><strong>Jeeva Memorial Public Senior Secondary School (JMPSSS)</strong></p>
            <p>&copy; {{ date('Y') }} JMPSSS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
