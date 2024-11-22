<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $token_data)
    {
        $this->user = $data;
        $this->token = $token_data;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject : 'Forgot Password',
        );
    }
    public function content(): Content{
        return new Content(
            view: 'emails.forgot-password',
        );
     }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forgot-password');
    }
}
