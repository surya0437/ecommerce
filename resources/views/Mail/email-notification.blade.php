<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Account Approval</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header {

            display: flex;
            align-items: center;
            justify-content: center;
            color: #703273;
            /* flex-direction: column; */
            padding: 10px;
            text-align: center;
            font-size: 24px;
        }
        .header img{
            width: 150px;
        }
        .content {
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        .content h2 {
            color: #703273;
            margin: 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #703273;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #aaa;
        }
    </style>
</head>
<body>
    {{-- @php
        $data = [
            'name' => 'surya',
            'email' => 'surya@gmail.com',
            'password' => 'password',
        ]
    @endphp --}}
    <div class="email-container">
        <div class="header">
            <img src="{{ asset('frontend/logo/logo.png') }}" alt="">
            {{-- <x-logo/> --}}
        </div>
        <div class="header">
           <p> Welcome to BazzarX Market!</p>
        </div>
        <div class="content">
            <h2>Hello {{ $data['name'] }},</h2>
            <p>We are excited to inform you that your request to become a vendor on our platform has been approved. You can now log in to your vendor dashboard using the credentials below:</p>

            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Password:</strong> {{ $data['password'] }}</p>

            <a href="[Login URL]" class="button">Login to Your Account</a>

            <p>If you have any questions or need assistance, feel free to contact our support team.</p>
            <p>Thank you for joining us, and we look forward to a successful partnership!</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} BazzarX Market !, All rights reserved.
        </div>
    </div>
</body>
</html>
