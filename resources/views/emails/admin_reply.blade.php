<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 6px solid #e14c1e; }
        .header { background-color: #ffffff; padding: 30px; text-align: center; border-bottom: 1px solid #f0f0f0; }
        .logo { max-width: 150px; }
        .content { padding: 40px; color: #333333; line-height: 1.8; }
        .content h2 { color: #004800; font-size: 22px; margin-bottom: 20px; }
        .message-box { background-color: #f9fafb; border-left: 4px solid #004800; padding: 20px; margin: 25px 0; font-style: italic; color: #4b5563; }
        .footer { background-color: #004800; padding: 25px; text-align: center; color: #ffffff; font-size: 13px; }
        .footer p { margin: 5px 0; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('assets/jmpsss/logo.png')) }}" alt="JMPSS Logo" class="logo">
        </div>
        <div class="content">
            <h2>Response to your {{ $type }} Inquiry</h2>
            <p>Hi <strong>{{ $name }}</strong>,</p>
            <p>Thank you for contacting **Jeeva Memorial Public Senior Secondary School (JMPSS)**. Our administration team has reviewed your inquiry and has provided the following response:</p>
            
            <div class="message-box">
                {!! nl2br(e($replyMessage)) !!}
            </div>
            
            <p>If you have any further questions, please feel free to reply to this email or visit our campus.</p>
            
            <p>Regards,<br><strong>JMPSS Admin Team</strong></p>
        </div>
        <div class="footer">
            <p>Jeeva Memorial Public Senior Secondary School (JMPSS)</p>
            <p>&copy; {{ date('Y') }} JMPSS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
