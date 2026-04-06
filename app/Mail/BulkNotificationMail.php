<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BulkNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $msgBody;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $name, $msgBody)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->msgBody = $msgBody;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $finalSubject = !empty($this->subject) ? $this->subject : 'Events Update';
        return $this->subject($finalSubject)
                    ->view('emails.bulk_manual')
                    ->with([
                        'name' => $this->name,
                        'messageBody' => $this->msgBody,
                    ]);
    }
}
