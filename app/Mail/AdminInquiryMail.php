<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;

class AdminInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New ' . $this->type . ' Inquiry - JMPSS',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_inquiry',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        
        // If it's a Career application and has a resume path
        if (isset($this->data['resume_path']) && file_exists(public_path($this->data['resume_path']))) {
            $attachments[] = Attachment::fromPath(public_path($this->data['resume_path']));
        }
        
        return $attachments;
    }
}
