<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Sprofesional\perfilProfesionalController;

class perfilProfesionalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cedula)
    {
        $this->cedula = $cedula;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {       
        
        $objPerfilProf = (new perfilProfesionalController)->cargarInfoPerfilSinAprobado($this->cedula);
        //dd($objPerfilProf);

        return $this->view('Mails.correoPerfilProf',compact('objPerfilProf'));

    }
}
