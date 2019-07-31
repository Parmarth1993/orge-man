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
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
                ->where('assigned_leads.status', '=', 0)
    			->whereNotIn('assigned_leads.lead_id', function($q){
				    $q->select('lead_id')->from('completed_leads');
				})
    			->get();
    	return view('franchises/dashboard', compact('leads'));
    }

    public function upcoming(){

        $user = Auth::user();
        $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('assigned_leads.franchises', '=', $user->id)
                ->where('assigned_leads.status', '=', 1)
                ->whereNotIn('assigned_leads.lead_id', function($q){
                    $q->select('lead_id')->from('completed_leads');
                })
                ->get();
        return view('franchises/upcoming', compact('leads'));

    }   

    public function markComplete(Request $request) {
    	$id = $request['id'];
    	$user = Auth::user();
    	$lead = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
    			->join('users', 'assigned_leads.franchises', '=', 'users.id')
    			->orderBy('assigned_leads.created_at')
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
    			->where('assigned_leads.lead_id', '=', $id)
				->first();
    	if ($request->isMethod('post')) {

             $file_invoice_image = $request->file('invoice_image');

            if(!empty($file_invoice_image)){

                $filename_invoice_image = $file_invoice_image->getClientOriginalName();

                //Move Uploaded File
                $destinationPath = 'uploads/franchise';
                $file_invoice_image->move($destinationPath,$file_invoice_image->getClientOriginalName());
            }else{
                $filename_invoice_image = '';
            }

            $file_job_images = $request->file('job_images');

            if(!empty($file_job_images)){

                $filename_job_images = $file_job_images->getClientOriginalName();

                //Move Uploaded File
                $destinationPath = 'uploads/franchise';
                $file_job_images->move($destinationPath,$file_job_images->getClientOriginalName());
            }else{
                $filename_job_images = '';
            }


    		$request->validate([
                'lead_id' => 'required',
                'franchises' => 'required',
                'employees_name' => 'required',
                'hours_worked' => 'required',
                'hourly_wage' => 'required',
                'paid_amount' => 'required',
                'supplies' => 'required',
                'job_notes' => 'required',
            ]);

            $input = $request->only('lead_id','franchises', 'employees_name', 'hours_worked', 'hourly_wage', 'paid_amount', 'invoice_image', 'job_images', 'supplies', 'job_notes');
            $input['supplies'] = json_encode($request['supplies']);
            $input['invoice_image'] = $filename_invoice_image;
            $input['job_images'] = $filename_job_images;

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
    			->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
    			->where('assigned_leads.franchises', '=', $user->id)
    			->where('completed_leads.franchises', '=', $user->id)
    			->get();
    	return view('franchises/completed-leads', compact('leads'));
    }

    public function confirm(Request $request){

            $id = $request['id'];
            $input['status'] = 1;
            if(AssignedLeads::Where('lead_id', $id)->update($input))
                return redirect('/franchises/leads/upcoming')->with('success', 'Lead has been assigned successfully.');
            else 
                return redirect('/franchises/leads/new')->with('error', 'Error assigning lead.');
    }

    public function view(Request $request) {
        $id = $request['id'];
        $user = Auth::user();

         $lead = CompletedLeads::join('quotes', 'completed_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'completed_leads.franchises', '=', 'users.id')
                ->orderBy('completed_leads.created_at')
                ->select('completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('completed_leads.lead_id', '=', $id)
                ->where('completed_leads.franchises', '=', $user->id)
                ->first();

        return view('franchises/view-lead', compact('lead'));
    }

}

