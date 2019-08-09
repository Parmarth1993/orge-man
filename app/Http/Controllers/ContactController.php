<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    //

    public function index(){

    	return view('contact');

    }

    public function publicContactPage() {
        return view('contact-public');        
    }

    public function send(Request $request){

        
        $request->validate([
          'first_name'=>'required',
          'last_name'=> 'required',
          'phone_number' => 'required',
          'email' => 'required',
          'address' => 'required',
        ]);
 

        $input = $request->only('first_name','last_name','phone_number','email','address');

        //echo "<pre>";print_r($input);die;
        $contact = new Contact([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'address' => $input['address'],
        ]);

        $contact->save();
        if(!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'localhost'))){
            Mail::to('parthibatman@gmail.com')->send(new ContactEmail($input));
        }

        return redirect('/contact')->with('success', 'Thank you for contacting us. We will revert back to you shortly.');

    }


}
