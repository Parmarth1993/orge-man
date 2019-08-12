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
        if($user->role === 'admin')
            return view('admin/profile', compact('user'));
        else
            return view('profile', compact('user'));

    }

    public function update(Request $request) {
        /**
         * Validate request/input 
         **/
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        /**
         * storing the input fields name & email in variable $input
         * type array
         **/
        if(isset($request['password']) && $request['password'] != '')
            $input = $request->only('first_name','last_name','address','phone_number', 'password', 'confirm_password');
        else
            $input = $request->only('first_name','last_name','address','phone_number');
        /**
         * fetching the user model
         */
        $user = Auth::user();

        /**
         * Accessing the update method and passing in $input array of data
         **/
        $user->update(['first_name' => $input['first_name'],
                       'last_name' => $input['last_name'],
                       'address' => $input['address'],
                       'phone_number' => $input['phone_number']]);

        /**
         * Change password if not blank

        /**
         * after everything is done return them pack to /profile/ uri
         **/
        if(isset($input['password']) && $input['password'] != '' &&$input['password'] == $input['confirm_password']) {
            $update = $user->update(['password' => bcrypt($input['password'])]);
            return redirect('/profile')->with('success', 'Password has been changed.');
        } else if(isset($input['password']) && $input['password'] != ''){
            return redirect('/profile')->with('error', 'Password and confirmed password not matched.');
        } else {
            return redirect('/profile')->with('success', 'Profile has been updated.');
        }
        // return back();
    }

    // public function changePassword(Request $request) {
    //     $user = Auth::user();
    //     if($request->isMethod('post')) {

    //         $this->validate($request, [
    //             'password' => 'required',
    //             'confirm_password' => 'required',
    //         ]);

    //         $input = $request->only('password', 'confirm_password');
    //         if($input['password'] == $input['confirm_password']) {
    //             $update = $user->update(['password' => bcrypt($input['password'])]);
    //             return redirect('/change-password')->with('success', 'Password has been changed.');
    //         } else {
    //             return redirect('/change-password')->with('error', 'Password and confirmed password not matched.');
    //         }
    //     }
    //     if($user->role == 'admin')
    //         return view('admin/change-password');
    //     else
    //         return view('change-password');
    // }
}
?>