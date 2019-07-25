<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
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

        /**
         * Passing the user data to profile view
         */
        return view('profile', compact('user'));

    }

    public function update(Request $request) {
        /**
         * Validate request/input 
         **/
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ]);

        /**
         * storing the input fields name & email in variable $input
         * type array
         **/
        $input = $request->only('name','phone_number');

        /**
         * fetching the user model
         */
        $user = Auth::user();

        /**
         * Accessing the update method and passing in $input array of data
         **/
        $user->update($input);

        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return back();
    }
}
?>