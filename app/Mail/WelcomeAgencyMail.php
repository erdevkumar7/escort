<?php
// app/Mail/WelcomeAgencyMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Agency;

class WelcomeAgencyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $agency;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Agency $agency
     * @return void
     */
    public function __construct(Agency $agency)
    {
        $this->agency = $agency;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to Our Platform')
                    ->view('auth.welcome-agency-email')
                    ->with([
                        'agency' => $this->agency,
                    ]);
    }
}
