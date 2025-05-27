@component('mail::message')
# Pengesahan Akaun

Terima kasih kerana mendaftar. Sila klik butang di bawah untuk mengesahkan alamat e-mel anda.

@component('mail::button', ['url' => $url])
Sahkan Alamat E-mel
@endcomponent

Pautan pengesahan ini akan tamat dalam {{ config('auth.verification.expire', 60) }} minit.

Jika anda tidak membuat pendaftaran ini, tiada tindakan lanjut diperlukan.

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent