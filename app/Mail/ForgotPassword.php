<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reset = DB::table('password_resets')
            ->where('email', $this->user->email)
            ->first();
        $url = route('reset-password', ['token' => $reset->token]);

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('You have requested password reset, Your password reset link is')
            ->action('Reset Password', $url)
            ->line('Thank you for using our application!');
    }
}
