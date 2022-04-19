<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;


    // definisco proprietà public e nel constructor vado a popolarla
    // classe responsabile per invio email

    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_lead)
    {
        // passo argomento che rappresenta il nostro lead - variabile $_lead collegata a $lead
        // quando inizializzo newconctact passo lead
        $this -> lead = $_lead;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-contact');
    }
}