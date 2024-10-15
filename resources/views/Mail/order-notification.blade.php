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

        .header img {
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
            'subject' => 'password',
            'vendor_name' => 'surya',
            'order_number' => '2155415',
            'total_amount' => 'surya',
            'customer_name' => 'surya',
            'shipping_address' => 'surya',
        ];
    @endphp --}}

    <div class="email-container">
        <div class="header">
            <x-logo/>
        </div>
        <div class="header">
            <p>{{ $data['subject'] }}</p>
        </div>
        <div class="content">
            <h2>Hello {{ $data['vendor_name'] }},</h2>
            <p>We are excited to inform you that you have received a new order on our platform. Below are the order
                details:</p>

            <p><strong>Order Number:</strong> {{ $data['order_number'] }}</p>
            <p><strong>Total Amount:</strong> {{ $data['total_amount'] }}/-</p>
            <p><strong>Customer Name:</strong> {{ $data['customer_name'] }}</p>
            <p><strong>Shipping Address:</strong> {{ $data['shipping_address'] }}</p>

            <p>Please ensure timely processing and fulfillment of this order to maintain customer satisfaction.</p>

            <a href="[Vendor Dashboard URL]" class="button">View Orders in Your Dashboard</a>

            <p>If you have any questions or need assistance, feel free to contact our support team.</p>
            <p>Thank you for your continued partnership with us!</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} BazzarX Market, All rights reserved.
        </div>
    </div>


</body>

</html>
