<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;


class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $content;
    public $name;
    public $phone;
    public function __construct($name,$phone,$email,$content)
    {
    
        $this->phone = $phone;
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
    }

    //envelope
    public function envelope(): Evelope{
        return new Evelope(
            subject: 'Contact Email',
        );
    }
    // content
    public function content(): Content{
        return new Content(
            view: 'emails.contact-mail',
        );
    }
    public function build()
    {
        return $this->view('emails.contact-mail');
    }
}
