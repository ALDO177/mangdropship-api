<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public string $tokens)
    {
        //
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('mangdropship.id123@gmail.com', 'Dropshiper'),
            subject: 'Password Reset',
        );
    }

    public function content()
    {
        return new Content(
            view: 'ResetPassword',
            with: ['token' => $this->tokens]
        );
    }

    public function attachments()
    {
        return [];
    }
}
