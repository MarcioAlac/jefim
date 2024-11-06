<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sac extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $senha;

    public function __construct($nome, $senha)
    {
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function build()
    {
        return $this->subject("Atenção seu cu foi penetrado !!!")
                    ->view('emails.cadastro');
    }
}
