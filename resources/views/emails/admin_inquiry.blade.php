<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e1e8ed; }
        .header { background-color: #004800; padding: 40px 30px; text-align: center; color: #ffffff; }
        .logo { max-width: 150px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 22px; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; color: #ffffff; }
        .content { padding: 40px 30px; color: #333333; line-height: 1.6; }
        .content h2 { color: #004800; border-bottom: 3px solid #e14c1e; padding-bottom: 12px; margin-top: 0; font-size: 20px; }
        .info-table { width: 100%; border-collapse: collapse; margin-top: 25px; background-color: #fafbfc; border-radius: 8px; }
        .info-table th { padding: 15px; text-align: left; border-bottom: 1px solid #edf2f7; color: #666; font-size: 13px; text-transform: uppercase; width: 160px; }
        .info-table td { padding: 15px; text-align: left; border-bottom: 1px solid #edf2f7; color: #333; font-weight: 600; font-size: 15px; }
        .footer { background-color: #002800; padding: 25px; text-align: center; color: #ffffff; font-size: 12px; opacity: 0.9; }
        .badge { background-color: #e14c1e; color: #ffffff; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('assets/jmpsss/logo.png')) }}" alt="JMPSS Logo" class="logo">
            <h1>New Portal Inquiry</h1>
        </div>
        <div class="content">
            <h2>{{ $type }} Details <span class="badge">New</span></h2>
            <p>Hi Admin, a new <strong>{{ strtolower($type) }}</strong> inquiry has been received from the website portal.</p>
            
            <table class="info-table">
                @foreach($data as $key => $value)
                    @if(!in_array($key, ['_token', 'resume', 'resume_path']))
                    <tr>
                        <th>{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                        <td>{{ $value }}</td>
                    </tr>
                    @endif
                @endforeach
            </table>

            <div style="margin-top: 40px; text-align: center; color: #666; font-size: 14px;">
                <p>Please check the admin panel for complete records and any uploaded files.</p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Jeeva Memorial Public Senior Secondary School (JMPSS). All rights reserved.</p>
        </div>
    </div>
</body>
</html>
