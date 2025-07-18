<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Remarque extends Mailable
{
    use Queueable, SerializesModels;
    public $nom;
    public $email;
    public $message;
    /**
     * Create a new message instance.
     */
    public function __construct($nom , $email , $messages)
    {
        //
        $this->nom = $nom;
        $this->email = $email;
        $this->message = $messages;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Remarque de '. $this->nom,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.remarque', 
            with: [
                'nom' => $this->nom,
                'email' => $this->email,
                'messages' => $this->message
                
            ],
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
