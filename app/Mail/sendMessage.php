<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $to_email;
    public $to_subject;
    /**
     * Create a new to_body instance.
     *
     * @return void
     */
    public function __construct($data, $to_email, $to_subject)
    {
            //
/*            $this->username = $username;*/
             $this->data = $data;
             $this->to_email = $to_email;
             $this->to_subject = $to_subject;
    }

    /**
     * Build the to_body.
     *
     * @return $this
     */
    public function build()
    {
   return $this->from($this->to_email)->subject($this->to_subject)->view('admin.mail')->with('data', $this->data);
    }
}
