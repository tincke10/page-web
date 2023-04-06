<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Consulta extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Consulta de plan';
    public $mensaje_enviar;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje_enviar)
    {
        $this->mensaje_enviar = $mensaje_enviar; 
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.consulta');
    }
}
