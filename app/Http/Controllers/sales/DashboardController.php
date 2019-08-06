<?php

namespace App\Http\Controllers\sales;

use Auth;
use App\User;
use App\Quote;
use App\AssignedLeads;
use App\CompletedLeads;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignQuote;
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
    	if($type == 'pending')
    		//get the list of assigned leads with lead/franchises details
    		$leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->whereNotIn('lead_id', function($q){
                        $q->select('lead_id')->from('completed_leads');
                    })
    			->get();
    	else if($type == 'completed')

    	   $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
               // ->where('assigned_leads.franchises', '=', $user->id)
               // ->where('completed_leads.franchises', '=', $user->id)
            ->get();
        else    
        	//get the list of leads which are not assigned in assigned_leads table
    		$leads = Quote::whereNotIn('id', function($q){
					    $q->select('lead_id')->from('assigned_leads');
					})->get();

    	return view('sales/leads', compact('leads', 'type'));
    }


    public function create(){
         $franchises = User::Where('role', 'franchises')->get();   
         return view('sales/assign-new-lead', compact('leads', 'franchises'));
    }
    public function assignNewLead(Request $request) {
         $user = Auth::user();
         $userid = $user->id;
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
 

        $input = $request->only('name','email','phone_number','date_of_job','delivery_address','departure_address','service_needed','location','estimate','additional_details');

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

        $id = $quote->id;

        $franchises = User::Where('role', 'franchises')->get();

        if ($request->isMethod('post')) {
            $request->validate([
                'franchises' => 'required',
            ]); 

            //save into assgined leads
            $input = $request->only('franchises','additional_details');

            $assignLead = new AssignedLeads([
                'sales_id' => $userid,
                'franchises' => $input['franchises'],
                'lead_id' => $id,
                'notes' => $input['additional_details'],
                'status' => 0,
            ]);

            $AssignedFranchisee = User::Where('id', $input['franchises'])->first();

            $franchiseedata['franchiseename'] = $AssignedFranchisee['first_name'];
            $franchiseedata['notes'] = $input['notes'];

            if($assignLead->save()){
                Mail::to($AssignedFranchisee['email'])->send(new AssignQuote($franchiseedata));
                return redirect('/sales/leads/assigned')->with('success', 'Lead has been added successfully.');
            }else{
                return redirect('/sales/lead/assign/' . $id)->with('error', 'Error saving lead.');
            }
        }
        //check if already assgined
        $checkAssigned = AssignedLeads::Where('lead_id', $id)->first();
        if($checkAssigned && $checkAssigned->id)
            return redirect('/sales/leads/assgined')->with('error', 'Lead has been already assgined.');
        else
            return view('sales/assign-lead', compact('lead', 'franchises'));

    
    }
    public function assignLead(Request $request) {

        $user = Auth::user();
        $userid = $user->id;

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
                'sales_id' => $userid,
                'franchises' => $input['franchises'],
                'lead_id' => $input['lead_id'],
                'notes' => $input['notes'],
                'status' => 0,
            ]);

            $AssignedFranchisee = User::Where('id', $input['franchises'])->first();

            $franchiseedata['franchiseename'] = $AssignedFranchisee['first_name'];
            $franchiseedata['notes'] = $input['notes'];

	        if($assignLead->save()){
                 Mail::to($AssignedFranchisee['email'])->send(new AssignQuote($franchiseedata));
	        	return redirect('/sales/leads/assigned')->with('success', 'Lead has been added successfully.');
	        }else{ 
	        	return redirect('/sales/lead/assign/' . $id)->with('error', 'Error saving lead.');
            }
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
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->first();
    	return view('sales/view-lead', compact('lead'));
    }

    public function viewComplete(Request $request){

        $id = $request['id'];
        $lead = CompletedLeads::join('quotes', 'completed_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'completed_leads.franchises', '=', 'users.id')
                ->orderBy('completed_leads.created_at')
                ->select('completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('completed_leads.lead_id', '=', $id)
                ->first();
        return view('sales/completed-view-lead', compact('lead'));

    }
}
