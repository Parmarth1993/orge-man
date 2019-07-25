<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FranchisesController extends Controller
{
    
	public function list() {
        $franchises = User::Where('role', 'franchises')->get();
        /**
         * Passing the user data to profile view
         */
        return view('admin/franchises', compact('franchises'));

    }

    public function add(Request $request) {
        
        if ($request->isMethod('post')) {

        	// $request->validate([
	        //     'first_name' => 'required',
	        //     'last_name' => 'required',
	        //     'user_name' => 'required',
	        //     'email' => 'required',
	        //     'address' => 'required',
	        //     'phone_number' => 'required',
	        // ]);	        

	        $input = $request->only('first_name', 'last_name', 'email', 'user_name', 'password', 'phone_number','address', 'logo');
	        $franchises = User::create([
	            'first_name' => $input['first_name'],
	            'last_name' => $input['last_name'],
	            'user_name' => $input['user_name'],
	            'email' => $input['email'],
	            'password' => bcrypt($input['password']),
	            'phone_number' => $input['phone_number'],
	            'role' => 'franchises',
	        ]);

	        if($franchises->save())
	        	return redirect('/admin/franchises')->with('success', 'Franchises has been added successfully.');
	        else 
	        	return redirect('/admin/add-franchises')->with('error', 'Franchises has been added successfully.');
	    } else {
	    	$password = rand();
        	return view('admin/add-franchises', compact('password'));
	    }

    }

    public function update(Request $request) {
        $id = $request['id'];
        if ($request->isMethod('post')) {

        	// $request->validate([
	        //     'first_name' => 'required',
	        //     'last_name' => 'required',
	        //     'user_name' => 'required',
	        //     'email' => 'required',
	        //     'address' => 'required',
	        //     'phone_number' => 'required',
	        // ]);	        

	        $input = $request->only('id', 'first_name', 'last_name','phone_number','address', 'logo');
	        // $franchises = User::Where('id', $id)->update($input);
	        
	        
	        if(User::Where('id', $id)->update($input))
	        	return redirect('/admin/franchises')->with('success', 'Franchises has been updated successfully.');
	        else 
	        	return redirect('/admin/franchises/edit/' . $id)->with('error', 'Error updating data.');
	    } else {
	    	$franchises = User::Where('id', $id)->first();
	    	return view('admin/edit-franchises', compact('franchises'));
	    }

    }

    public function delete(Request $request) {
        $id = $request['id'];
        $franchises = User::Where('id', $id)->delete();
        return redirect('/admin/franchises')->with('success', 'Franchises has been deleted successfully.');
    }
}
