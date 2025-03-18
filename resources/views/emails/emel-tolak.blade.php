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
            <h2>KEPUTUSAN PERMOHONAN PEMBIAYAAN TEKUN NASIONAL</h2>
            <p>Nama: {{ $data['cust_name'] }}</p>
            <p>No. KP: {{ $data['cust_icno'] }}</p>
            <p>No. Rujukan: {{ $data['id'] }}</p>
            <p>Tuan/Puan</p>
            <h2>KEPUTUSAN PERMOHONAN PEMBIAYAAN TEKUN NASIONAL</h2>
            <p>Dengan segala hormatnya perkara di atas adalah dirujuk.</p>
            <p>2. Untuk makluman, permohonan pembiayaan tuan/puan telah diberikan pertimbangan yang sewajarnya. Dukacita dimaklumkan bahawa permohonan pembiayaan TEKUN tuan/puan adalah TIDAK BERJAYA kerana:</p>
            <p>{{ $data['appln_result1_rem'] }}</p>
            <p>3. Tuan/Puan boleh mengemukakan semula permohonan sekiranya memenuhi syarat-syarat yang ditetapkan oleh TEKUN Nasional. Sila hubungi atau lawati TEKUN berhampiran untuk maklumat lanjut.</p>
            <p>Sekian, terima kasih.</p>
            <p>“TEMAN NIAGA ANDA”</p>
            <p>(e-mel ini adalah cetakan berkomputer dan tidak memerlukan tandatangan serta tidak perlu dibalas)</p>
        </div>

        <img src="{{ $message->embed(public_path('img/email_footer.png')) }}" class="footer-image" alt="Footer">
    </div>
</body>
</html>