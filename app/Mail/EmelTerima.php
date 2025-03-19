<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmelTerima extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Pastikan ada pembolehubah untuk simpan data

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Emel Terima Tawaran Daripada TEKUN Online',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.emel-terima',
            with: ['data' => $this->data], // Pass data ke dalam view
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
