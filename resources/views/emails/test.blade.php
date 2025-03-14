<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header-image {
            width: 600px;
            height: auto;
            display: block;
        }
        .footer-image {
            width: 600px;
            height: auto;
            display: block;
            margin-top: 20px;
        }
        .content {
            padding: 20px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ $message->embed(public_path('img/email_header.png')) }}" class="header-image" alt="Header">
        
        <div class="content">
            <h2>Test Email</h2>
            <p>This is a test email to verify the email functionality is working correctly.</p>
            <p>The header and footer images should be properly embedded in this email.</p>
        </div>

        <img src="{{ $message->embed(public_path('img/email_footer.png')) }}" class="footer-image" alt="Footer">
    </div>
</body>
</html>