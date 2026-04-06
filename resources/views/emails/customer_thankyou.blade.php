<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e1e8ed; }
        .header { background-color: #ffffff; padding: 40px 30px; text-align: center; border-bottom: 5px solid #004800; }
        .logo { max-width: 180px; }
        .content { padding: 50px 40px; color: #333333; line-height: 1.8; text-align: center; }
        .content h2 { color: #004800; margin-top: 0; font-size: 26px; font-weight: 700; }
        .content p { font-size: 16px; color: #555; }
        .button { display: inline-block; padding: 14px 35px; background-color: #e14c1e; color: #ffffff; text-decoration: none; border-radius: 30px; font-weight: bold; margin-top: 30px; transition: background 0.3s; box-shadow: 0 4px 10px rgba(225, 76, 30, 0.3); }
        .footer { background-color: #004800; padding: 30px; text-align: center; color: #ffffff; font-size: 13px; }
        .footer p { margin: 5px 0; opacity: 0.9; }
        .social-link { color: #ffffff; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('assets/jmpsss/logo.png')) }}" alt="JMPSS Logo" class="logo">
        </div>
        <div class="content">
            <h2>Thank You for Reaching Out!</h2>
            <p>Hi <strong>{{ $data['name'] ?? $data['student_name'] ?? 'User' }}</strong>,</p>
            <p>We have successfully received your <strong>{{ strtolower($type) }}</strong> enquiry. Our team is currently reviewing the information you shared.</p>
            
            <p>You can expect a response from us within the next 24-48 working hours. We are excited to assist you further!</p>
            
            <a href="{{ url('/') }}" class="button">Visit Our Campus Website</a>
        </div>
        <div class="footer">
            <p><strong>Jeeva Memorial Public Senior Secondary School (JMPSSS)</strong></p>
            <p>&copy; {{ date('Y') }} JMPSSS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
