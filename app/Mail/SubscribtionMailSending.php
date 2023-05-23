<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscribtionMailSending extends Mailable
{
    use Queueable, SerializesModels;
    public string $tokens;
    public function __construct(string $tokens)
    {
        $this->tokens = $tokens;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('aldo.ratmawan9999@gmail.com', 'Dropshiper'),
            subject: 'Account Register Verify',
        );
    }

    public function content()
    {
        return new Content(
            view: 'NoticeSubscribtions',
            with: ['route' => route('verify.email', ['mang' => $this->tokens])]
        );
    }

    public function attachments()
    {
        return [];
    }
}
