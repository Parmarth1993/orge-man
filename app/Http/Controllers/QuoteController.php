<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Quote;
use Illuminate\Http\Request;

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
      ]);
 

        $input = $request->only('name','email','phone_number','delivery_address','departure_address');

        //echo "<pre>";print_r($input);die;
        $quote = new Quote([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'delivery_address' => $input['delivery_address'],
            'departure_address' => $input['departure_address'],
        ]);

        $quote->save();

        return redirect('/get-quote')->with('success', 'Quote has been sent Successfully.');

    }

}
?>