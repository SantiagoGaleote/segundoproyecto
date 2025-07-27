<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $user)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "¡Bienvenido/a a " . config('app.name') . "! 📚 Tu aventura literaria comienza ahora"
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
            with: [
                'nombre' => $this->user->nombre,
                'appName' => config('app.name'),
                'catalogUrl' => url('/libros')
            ]
        );
    }
}