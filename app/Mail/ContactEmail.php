<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $firstname;
    public $lastname;
    public $phonenumber;
    public $email;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->firstname = $data['first_name'];
        $this->lastname = $data['last_name'];
        $this->phonenumber = $data['phone_number'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        //print_r($this);die;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact');
    }
}
