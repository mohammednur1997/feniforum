<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MemberResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    /*public $token;*/
    public $member_token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($member_token)
    {
        /*$this->token = $token;*/
        $this->member_token = $member_token;
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
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', route('member.password.reset'))
            ->line('If you did not request a password reset, no further action is required.');
    }
}
