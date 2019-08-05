<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendQuote extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone_number;
    public $date_of_job;
    public $delivery_address;
    public $departure_address;
    public $service_needed;
    public $location;
    public $estimate;
    public $additional_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone_number = $data['phone_number'];
        $this->date_of_job = $data['date_of_job'];
        $this->delivery_address = $data['delivery_address'];
        $this->departure_address = $data['departure_address'];
        $this->service_needed = $data['service_needed'];
        $this->location = $data['location'];
        $this->estimate = $data['estimate'];
        $this->additional_details = $data['additional_details'];
        //print_r($this);die;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.sendquote');
    }
}
