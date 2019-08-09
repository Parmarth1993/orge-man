<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $role;
    public $server;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->role = $data['role'];
        $this->server = $data['SERVER'];
        //print_r($this);die;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.register');
    }
}
