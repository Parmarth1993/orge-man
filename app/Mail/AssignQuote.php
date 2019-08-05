<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignQuote extends Mailable
{
    use Queueable, SerializesModels;
    public $franchisee;
    public $notes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->franchisee = $data['franchiseename'];
        $this->notes = $data['notes'];
        //print_r($this);die;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.assignquote');
    }
}
