<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUser;

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


        	$request->validate([
	            'first_name' => 'required',
	            'last_name' => 'required',
	            'user_name' => 'required|string|max:255|unique:users',
	            'email' => 'required|string|email|max:255|unique:users',
	            'address' => 'required',
	            'phone_number' => 'required',
	            'employees' => 'required',
	            'owner_name' => 'required',
	            'no_of_trucks' => 'required',
	        ]);	  

        	  // File upload		
              $file = $request->file('logo');

              if(!empty($file)){

	              $filename = $file->getClientOriginalName();

			      //Move Uploaded File
			      $destinationPath = 'uploads/franchise';
			      $file->move($destinationPath,$file->getClientOriginalName());
              }else{
              	$filename = '';
              }

	        $input = $request->only('first_name', 'last_name', 'email', 'user_name', 'password', 'phone_number','address', 'logo','employees','owner_name','no_of_trucks');

	        $employeeNames = json_encode($input['employees']);

	        $franchises = User::create([
	            'first_name' => $input['first_name'],
	            'last_name' => $input['last_name'],
	            'user_name' => $input['user_name'],
	            'email' => $input['email'],
	            'password' => bcrypt($input['password']),
	            'phone_number' => $input['phone_number'],
	            'address' => $input['address'],
	            'role' => 'franchises',
	            'logo' => $filename,
	            'employees' => $employeeNames,
	            'owner_name' => $input['owner_name'],
	            'no_of_trucks' => $input['no_of_trucks'],
	        ]);

	        if($franchises->save())
	        	if(!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'localhost'))){
	        		$input['SERVER'] = $_SERVER['REMOTE_ADDR'];
                    Mail::to($input['email'])->send(new RegisterUser($input));
                }
	        	return redirect('/admin/franchises')->with('success', 'Franchises has been added successfully.');
	        else 
	        	return redirect('/admin/add-franchises')->with('error', 'Error saving Franchises.');
	    } else {
	    	$password = rand();
        	return view('admin/add-franchises', compact('password'));
	    }

    }

    public function update(Request $request) {
        $id = $request['id'];
        if ($request->isMethod('post')) {

        	$request->validate([
	            'first_name' => 'required',
	            'last_name' => 'required',
	            'address' => 'required',
	            'phone_number' => 'required',
	            'role' => 'franchises',
	            'employees' => 'required',
	            'owner_name' => 'required',
	            'no_of_trucks' => 'required',
	        ]);	

	          $file = $request->file('logo');

              if(!empty($file)){

	              $input['logo'] = $file->getClientOriginalName();

			      //Move Uploaded File
			      $destinationPath = 'uploads/franchise';
			      $file->move($destinationPath,$file->getClientOriginalName());
              }else{
              	  $input['logo'] = $request['oldimage'];
              }         

	        $input = $request->only('id', 'first_name', 'last_name','phone_number','address', 'logo','employees','owner_name','no_of_trucks');

	        if(!empty($file)){
	       	 $input['logo'] = $input['logo']->getClientOriginalName();
	    	}

	    	$employeeNames = json_encode($input['employees']);
	        $input['employees'] = $employeeNames;
	        
	    	if(User::Where('id', $id)->update($input))
	        	return redirect('/admin/franchises')->with('success', 'Franchises has been updated successfully.');
	        else 
	        	return redirect('/admin/franchises/edit/' . $id)->with('error', 'Error updating data.');
	    } else {
	    	$franchises = User::Where('id', $id)->first();
	    	$employees = json_decode($franchises->employees, true);
	    	return view('admin/edit-franchises', compact('franchises', 'employees'));
	    }

    }

    public function delete(Request $request) {
        $id = $request['id'];
        $franchises = User::Where('id', $id)->delete();
        return redirect('/admin/franchises')->with('success', 'Franchises has been deleted successfully.');
    }
}
