<?php

// app/Mail/WelcomeEscortMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Escort;

class WelcomeEscortMail extends Mailable
{
    use Queueable, SerializesModels;

    public $escort;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Escort $escort
     * @return void
     */
    public function __construct(Escort $escort)
    {
        $this->escort = $escort;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to Our Platform')
                    ->view('auth.welcome-escorts-email')
                    ->with([
                        'escort' => $this->escort,
                    ]);
    }
}
