<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    
	public function list() {
        $sales = User::Where('role', 'sales')->get();
        /**
         * Passing the user data to profile view
         */
        return view('admin/sales', compact('sales'));

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
	        ]);	  

        	  // File upload		
              $file = $request->file('logo');

              if(!empty($file)){

	              $filename = $file->getClientOriginalName();

			      //Move Uploaded File
			      $destinationPath = 'uploads/sales';
			      $file->move($destinationPath,$file->getClientOriginalName());
              }else{
              	$filename = '';
              }

	        $input = $request->only('first_name', 'last_name', 'email', 'user_name', 'password', 'phone_number','address', 'logo','employees');

	        $employeename = json_encode($input['employees']);

	        $sales = User::create([
	            'first_name' => $input['first_name'],
	            'last_name' => $input['last_name'],
	            'user_name' => $input['user_name'],
	            'email' => $input['email'],
	            'password' => bcrypt($input['password']),
	            'phone_number' => $input['phone_number'],
	            'address' => $input['address'],
	            'role' => 'sales',
	            'logo' => $filename,
	            'employees' => $employeename,
	        ]);

	        if($sales->save())
	        	return redirect('/admin/sales')->with('success', 'Sales has been added successfully.');
	        else 
	        	return redirect('/admin/add-sales')->with('error', 'Error saving sales.');
	    } else {
	    	$password = rand();
        	return view('admin/add-sales', compact('password'));
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

	        $input = $request->only('id', 'first_name', 'last_name','phone_number','address', 'logo');

	        if(!empty($file)){
	       	 $input['logo'] = $input['logo']->getClientOriginalName();
	    	}
	        
	        
	        if(User::Where('id', $id)->update($input))
	        	return redirect('/admin/sales')->with('success', 'Sales has been updated successfully.');
	        else 
	        	return redirect('/admin/sales/edit/' . $id)->with('error', 'Error updating data.');
	    } else {
	    	$sales = User::Where('id', $id)->first();
	    	return view('admin/edit-sales', compact('sales'));
	    }

    }

    public function delete(Request $request) {
        $id = $request['id'];
        $sales = User::Where('id', $id)->delete();
        return redirect('/admin/sales')->with('success', 'Sales has been deleted successfully.');
    }
}
