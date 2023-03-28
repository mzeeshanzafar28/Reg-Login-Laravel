<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    // public $code;
    // public $subject;
    // public $user_id;
    public $data;
    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $verificationCode
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        // $this->code = $data['code'];
        // $this->subject = $data['subject'];
        // $this->user_id = $data['user_id'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject($this->data['subject'])->view('forMail')->with('data', $this->data);
        return $this->subject($this->data['subject'])->view('forMail')->with('code', $this->data['code']);

    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'forMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
