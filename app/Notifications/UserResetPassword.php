<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $token = $this->token;
        return (new MailMessage)
            ->view('reset.email', compact(['token']))
            ->subject( 'Đặt lại mật khẩu' );
            //  ->line('Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ tài khoản của bạn.')
            // ->action('Đặt lại mật khẩu', url('user/password/reset', $this->token))
            // ->line('Nếu bạn không yêu cầu đặt lại mật khẩu, bạn không cần hành động nào với email này.');
    }
}
