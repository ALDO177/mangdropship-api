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
    public function __construct()
    {
        //
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
            view: 'SubscriptionEmailTemplate',
        );
    }

    public function attachments()
    {
        return [];
    }
}
