<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OlvidoContrasenaMailable extends Mailable
{
    use Queueable, SerializesModels;

    
    
    public $subject="Recuperacion de datos de inicio de sesión";

    public $usuario;
    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$usuario,$password)
    {
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.olvidocontrasena');
    }
}
