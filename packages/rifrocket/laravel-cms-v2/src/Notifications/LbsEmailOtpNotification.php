<?php

namespace Rifrocket\LaravelCmsV2\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LbsEmailOtpNotification extends Notification
{
    use Queueable;

    public $otp=null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
       $this->otp=$otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($notifiable);
        return (new MailMessage)
                ->greeting('hello there!')
                ->line('Please find your one time password bellow: ')
                ->line($this->otp)
                ->line('This OTP will expire in '.config('laravel-cms-v2.otp_expiry'). ' minutes')
                ->line('Thank you for using our application!')
                ->subject(env('APP_NAME'). ': One Time Password')
                ;
}

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
