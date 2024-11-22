<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $account;

    public function __construct($acc)
    {
        $this->account =$acc;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // Get the message envelope
    public function envelope(): Envelope
    {
        return new Envelope(
            subject : 'Verify Account',
        );
    }
    public function content(): Content{
        return new Content(
            view: 'emails.verify-account',
        );
     }

    public function build()
    {
        return $this->view('emails.verify-account');
    }
}
