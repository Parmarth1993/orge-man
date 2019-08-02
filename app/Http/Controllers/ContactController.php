<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function index(){

    	return view('Contact');

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

        return redirect('/contact')->with('success', 'Thank you for contacting us. We will revert back to you shortly.');

    }


}