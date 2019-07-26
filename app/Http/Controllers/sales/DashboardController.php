<?php

namespace App\Http\Controllers\sales;

use Auth;
use App\User;
use App\Quote;
use App\AssignedLeads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
    	$leads = Quote::orderBy('created_at')->get();
    	return view('sales/dashboard', compact('leads'));
    }

    public function leads(Request $request) {
    	$type = $request['type'];
    	if($type == 'assigned')
    		//get the list of assigned leads with lead/franchises details
    		$leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->get();
    	else
    		//get the list of leads which are not assigned in assigned_leads table
    		$leads = Quote::whereNotIn('id', function($q){
					    $q->select('lead_id')->from('assigned_leads');
					})->get();

    	return view('sales/leads', compact('leads', 'type'));
    }

    public function assignLead(Request $request) {
    	$id = $request['id'];
    	$lead = Quote::Where('id', $id)->first();
    	$franchises = User::Where('role', 'franchises')->get();

    	if ($request->isMethod('post')) {
    		$request->validate([
	            'franchises' => 'required',
	            'lead_id' => 'required',
	        ]);	

    		//save into assgined leads
    		$input = $request->only('franchises', 'lead_id', 'notes');
	        $assignLead = new AssignedLeads([
	            'franchises' => $input['franchises'],
	            'lead_id' => $input['lead_id'],
	            'notes' => $input['notes'],
	        ]);

	        if($assignLead->save())
	        	return redirect('/sales/leads/assigned')->with('success', 'Lead has been added successfully.');
	        else 
	        	return redirect('/sales/lead/assign/' . $id)->with('error', 'Error saving lead.');
    	}
    	//check if already assgined
    	$checkAssigned = AssignedLeads::Where('lead_id', $id)->first();
    	if($checkAssigned && $checkAssigned->id)
    		return redirect('/sales/leads/assgined')->with('error', 'Lead has been already assgined.');
    	else
    		return view('sales/assign-lead', compact('lead', 'franchises'));
    }

    public function view(Request $request) {
    	$id = $request['id'];
    	$lead = AssignedLeads::Where('assigned_leads.id', $id)
    			->join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->first();
    	return view('sales/view-lead', compact('lead'));
    }
}
