<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letterBody;

    public function __construct($body = ['user' => 'Name', 'order' => 'order #' ])
    {
       $this->subject('New order');
       $this->letterBody = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.letter',$this->letterBody);
    }
}
