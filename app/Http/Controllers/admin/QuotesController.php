<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use App\Quote;
use App\AssignedLeads;
use App\CompletedLeads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotesController extends Controller
{

    public function list() {
        /**
         * fetching the user model
         **/
        $user = Auth::user();
        $quotes = Quote::orderBy('created_at')->get();
        /**
         * Passing the user data to profile view
         */
        return view('admin/quotes', compact('user', 'quotes'));

    }

    public function upcoming(Request $request) {

        $type = $request['type'];
        $filterName = ($request['name']) ? $request['name'] : '';
        $filterDate = ($request['date']) ? $request['date'] : '';
       
        if($type == 'pending')
            //get the list of assigned leads with lead/franchises details
            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->whereNotIn('lead_id', function($q){
                        $q->select('lead_id')->from('completed_leads');
                    })
                ->where('quotes.name', 'like', '%' . $filterName . '%')
                ->where('quotes.date_of_job', 'like', '%' . $filterDate . '%')
                ->get();
        else if($type == 'completed')

           $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.name', 'like', '%' . $filterName . '%')
                ->where('quotes.date_of_job', 'like', '%' . $filterDate . '%')
            ->get();
        else    
            //get the list of leads which are not assigned in assigned_leads table
            $leads = Quote::whereNotIn('id', function($q){
                        $q->select('lead_id')->from('assigned_leads');
                    })
                    ->where('name', 'like', '%' . $filterName . '%')
                    ->where('date_of_job', 'like', '%' . $filterDate . '%')
                    ->get();

        return view('admin/leads', compact('leads', 'type', 'filterName', 'filterDate'));

    }

    public function delete(Request $request) {
        $id = $request['id'];
        $quotes = Quote::Where('id', $id)->delete();
        return redirect('/admin/quotes')->with('success', 'Quote has been deleted successfully.');
    }
}
