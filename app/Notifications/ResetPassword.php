<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordBase;

class ResetPassword extends ResetPasswordBase
{
    /**
     * Get the reset password notification mail message for the given URL.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Pemberitahuan Tetapan Semula Kata Laluan'))
            ->line(Lang::get('Anda menerima e-mel ini kerana kami menerima permintaan untuk menetapkan semula kata laluan bagi akaun anda.'))
            ->action(Lang::get('Tetapkan Semula Kata Laluan'), $url)
            ->line(Lang::get('Pautan tetapan semula kata laluan ini akan tamat tempoh dalam :count minit.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Jika anda tidak membuat permintaan untuk menetapkan semula kata laluan, tiada tindakan lanjut diperlukan.'));
    }
}