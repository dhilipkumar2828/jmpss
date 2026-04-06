<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class AdminReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $name;
    public $replyMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($type, $name, $replyMessage)
    {
        $this->type = $type;
        $this->name = $name;
        $this->replyMessage = $replyMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Response from JMPSS - ' . $this->type . ' Inquiry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_reply',
        );
    }
}
