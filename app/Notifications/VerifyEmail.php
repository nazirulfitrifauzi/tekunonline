<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    /**
     * Get the verification email notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->greeting(Lang::get('Assalamualaikum dan Salam Sejahtera'))
            ->subject(Lang::get('Pengesahan Akaun'))
            ->line(Lang::get('Terima kasih kerana mendaftar. Sila klik butang di bawah untuk mengesahkan alamat e-mel anda.'))
            ->action(Lang::get('Sahkan Alamat E-mel'), $url)
            ->line(Lang::get('Pautan pengesahan ini akan tamat dalam :count minit.', ['count' => Config::get('auth.verification.expire', 60)]))
            ->line(Lang::get('Jika anda tidak membuat pendaftaran ini, tiada tindakan lanjut diperlukan.'))
            ->salutation(Lang::get("Yang benar,\n\nTEKUN Online"));
    }

}