<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use App\Quote;
use App\AssignedLeads;
use App\CompletedLeads;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $filterFranchises = ($request['filterFranchises']) ? $request['filterFranchises'] : '';
        $dateOfMove = ($request['date_of_job']) ? $request['date_of_job'] : '';
        $franchises = User::Where('role', 'franchises')->get();
        $completionDate = ($request['completion_date']) ? $request['completion_date'] : '';
        $exportname = ($request['exportdata'] && $request['exportdata'] !='') ? $request['exportdata'] : '' ;
       
        if($type == 'upcoming')
            //get the list of assigned leads with lead/franchises details
            if(isset($filterFranchises) && $filterFranchises !='')
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                    ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                    ->orderBy('assigned_leads.created_at')
                    ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id')
                    ->whereNotIn('lead_id', function($q){
                            $q->select('lead_id')->from('completed_leads');
                        })
                    ->where('assigned_leads.franchises', $filterFranchises)
                    ->get();
            else if(isset($dateOfMove) && $dateOfMove !='')
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                    ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                    ->orderBy('assigned_leads.created_at')
                    ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id')
                    ->whereNotIn('lead_id', function($q){
                            $q->select('lead_id')->from('completed_leads');
                        })
                    ->where('quotes.date_of_job', $dateOfMove)
                    ->get();
            else
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                    ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                    ->orderBy('assigned_leads.created_at')
                    ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id')
                    ->whereNotIn('lead_id', function($q){
                            $q->select('lead_id')->from('completed_leads');
                        })
                    ->get();
        else if($type == 'completed')
            if(isset($dateOfMove) && $dateOfMove !='')
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id', 'completed_leads.created_at as completion_date')
                ->where('quotes.date_of_job', $dateOfMove)
                ->get();
            else if(isset($filterFranchises) && $filterFranchises !='')
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id', 'completed_leads.created_at as completion_date')
                ->where('assigned_leads.franchises', $filterFranchises)
                ->get();
            else if(isset($completionDate) && $completionDate !='')
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                    ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                    ->join('completed_leads', 'completed_leads.lead_id', '=', 'quotes.id')
                    ->orderBy('assigned_leads.created_at')
                    ->select('assigned_leads.*', 'completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id', 'completed_leads.created_at as completion_date')
                    ->where('completed_leads.created_at', date('Y-m-d',strtotime($completionDate)))
                    ->get();
            else
                $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email', 'users.id as franchises_id', 'completed_leads.created_at as completion_date')
                ->get();
        else    
            //get the list of leads which are not assigned in assigned_leads table
            $leads = Quote::whereNotIn('id', function($q){
                        $q->select('lead_id')->from('assigned_leads');
                    })
                    ->where('name', 'like', '%' . $filterName . '%')
                    ->where('date_of_job', 'like', '%' . $filterDate . '%')
                    ->get();
        // echo date('Y-m-d h:i:s',strtotime($completionDate)); die;
        if(isset($exportname) && $exportname == 'csv'){
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
            $columns = array('Id', 'Quote Name','Date of Job','Employees names', 'Hours worked', 'Hourly wage', 'How much the customers paid', 'If repeat customer or not', 'Additional job notes','Upload image of the invoice','Supplies sold');
            $callback = function() use ($leads,$columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
                $counter = 1;
                foreach($leads as $leadall) {
                    $imageinvoice = $_SERVER['REMOTE_ADDR'].'/uploads/franchise/'.$leadall['invoice_image'];
                    fputcsv($file, array($counter, $leadall['quote_name'],$leadall['dateofjob'],$leadall['employees_name'], $leadall['hours_worked'],$leadall['hourly_wage'],$leadall['paid_amount'],'no',$leadall['job_notes'],$imageinvoice,$leadall['supplies']));
                    $counter++; 
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } else {
            return view('admin/leads', compact('leads', 'type', 'filterName', 'filterDate', 'franchises', 'filterFranchises' , 'dateOfMove', 'completionDate'));
        }

    }

    public function delete(Request $request) {
        $id = $request['id'];
        $quotes = Quote::Where('id', $id)->delete();
        return redirect('/admin/quotes')->with('success', 'Quote has been deleted successfully.');
    }

    public function viewComplete(Request $request) {
        $id = $request['id'];
        $quote = CompletedLeads::join('quotes', 'completed_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'completed_leads.franchises', '=', 'users.id')
                ->where('completed_leads.id', $id)->first();
        $supplies = json_decode($quote->supplies, true);
        // echo "<pre>";
        // echo sizeOf($supplies);
        // print_r($supplies);
        // echo "</pre>";
        // die();
        return view('admin/view-quote-completed', compact('quote', 'supplies'));        
    }
}
