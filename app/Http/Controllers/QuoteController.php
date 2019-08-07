<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendQuote;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    /**
     * Update user profile & make backend push to DB
     * 
    **/

    public function index() {

        /**
         * fetching the user model
         **/
        $user = Auth::user();
        //var_dump($user);

        /**
         * Passing the user data to profile view
         */

        return view('quote', compact('user'));

    }

    public function add(Request $request){

        
        $request->validate([
          'name'=>'required',
          'email'=> 'required',
          'phone_number' => 'required',
          'delivery_address' => 'required',
          'departure_address' => 'required',
          'date_of_job' => 'required',
          'service_needed' => 'required',
          'location' => 'required',
          'estimate' => 'required',
          'additional_details' => 'required',

        ]);
 

        $input = $request->only('name','email','phone_number','date_of_job','delivery_address','departure_address','service_needed','formtype','location','estimate','additional_details');

        //echo "<pre>";print_r($input);die;
        $quote = new Quote([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'date_of_job' => $input['date_of_job'],
            'delivery_address' => $input['delivery_address'],
            'departure_address' => $input['departure_address'],
            'service_needed' => $input['service_needed'],
            'location' => $input['location'],
            'estimate' => $input['estimate'],
            'additional_details' => $input['additional_details'],
        ]);

          $quote->save();

        if($input['formtype'] == 'home'){
            echo json_encode(array('success' => 'true','message' => 'Quote Sent Successfully.'));
        }else{
          
          $emails = ['parthibatman@gmail.com', 'randhirsinghpaul@gmail.com'];
          Mail::to($emails)->send(new SendQuote($input));

          return redirect('/get-quote')->with('success', 'Quote has been sent Successfully.');
        }

    }

}
?>