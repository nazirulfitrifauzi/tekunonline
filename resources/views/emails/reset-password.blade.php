@component('mail::message')
# Reset Password Notification

Anda menerima e-mel ini kerana kami menerima permintaan tetapan semula kata laluan untuk akaun anda.

@component('mail::button', ['url' => $url])
Tetapkan Semula Kata Laluan
@endcomponent

Pautan tetapan semula kata laluan ini akan tamat dalam {{ config('auth.passwords.users.expire') }} minit.

Jika anda tidak meminta tetapan semula kata laluan, tiada tindakan lanjut diperlukan.

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent 