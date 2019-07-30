<?php

namespace App\Http\Controllers\franchises;

use Auth;
use App\User;
use App\Quote;
use App\AssignedLeads;
use App\CompletedLeads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function index(){

    	$user = Auth::user();
    	$leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
    			->whereNotIn('assigned_leads.lead_id', function($q){
				    $q->select('lead_id')->from('completed_leads');
				})
    			->get();
    	return view('franchises/dashboard', compact('leads'));
    }

    public function markComplete(Request $request) {
    	$id = $request['id'];
    	$user = Auth::user();
    	$lead = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
    			->where('assigned_leads.lead_id', '=', $id)
				->first();
    	if ($request->isMethod('post')) {
    		$request->validate([
                'lead_id' => 'required',
                'franchises' => 'required',
                'employees_name' => 'required',
                'hours_worked' => 'required',
                'hourly_wage' => 'required',
                'paid_amount' => 'required',
                'invoice_image' => 'required',
                'job_images' => 'required',
                'supplies' => 'required',
                'job_notes' => 'required',
            ]);

            $input = $request->only('lead_id','franchises', 'employees_name', 'hours_worked', 'hourly_wage', 'paid_amount', 'invoice_image', 'job_images', 'supplies', 'job_notes');
            $input['supplies'] = json_encode($request['supplies']);
            $lead = new CompletedLeads($input);
            if($lead->save())
            	return redirect('/franchises/dashboard')->with('success', 'Order has been completed.');
        	else
        		return redirect('lead/complete/' . $id)->with('error', 'Error completing order.');
    	}
    	return view('franchises/complete-lead', compact('lead', 'user'));
    }

    public function completedLeads(Request $request) {
    	$user = Auth::user();
    	$leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
    			->where('completed_leads.franchises', '=', $user->id)
    			->get();
    	return view('franchises/completed-leads', compact('leads'));
    }
}
