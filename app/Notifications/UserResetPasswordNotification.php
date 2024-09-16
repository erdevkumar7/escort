<?php
// app/Notifications/UserResetPasswordNotification.php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class UserResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    // Define the notification delivery channels
    public function via($notifiable)
    {
        return ['mail']; // Specify 'mail' to send the notification via email
    }

    // Customize the email notification
    public function toMail($notifiable)
    {
        $resetUrl = url(route('user.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Reset Password'), $resetUrl)
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }
}
