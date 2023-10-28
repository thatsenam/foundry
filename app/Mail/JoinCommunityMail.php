<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinCommunityMail extends Mailable
{
    use Queueable, SerializesModels;

    private $invite;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invite)
    {
        $this->invite = $invite;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->invite->sender->name ." invited you to join " .$this->invite->community->name ?? " ")->markdown('emails.JoinCommunityMail', [
            'invite' => $this->invite,
        ]);
    }
}
