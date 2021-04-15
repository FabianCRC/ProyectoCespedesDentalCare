<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroNuevoUsuarioMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="Registro nuevo usuario";

    public $usuario;
    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$email,$password)
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
        return $this->view('emails.nuevousuario');
    }
}
