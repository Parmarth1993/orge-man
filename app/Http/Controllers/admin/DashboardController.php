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

class DashboardController extends Controller
{
    public function index() {

        /**
         * fetching the user model
         **/
        $user = Auth::user();
        $quotes = Quote::orderBy('created_at')->get();
        /**
         * Passing the user data to profile view
         */
        return view('admin/dashboard', compact('user', 'quotes'));

    }

    public function reports(Request $request){

        /**
         * fetching the user model
         **/
        $exportname = $request['exportdata'];
        $filterFrom = ($request['start_from']) ? $request['start_from'] : '';
        $filterEnd  = ($request['start_end']) ? $request['start_end'] : '';
         if(isset($exportname) && $exportname == 'csv' &&  $filterEnd == '' &&  $filterFrom == ''){

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*','completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
            ->get();

            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

           // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
            $columns = array('Id', 'Quote Name','Date of Job','Employees names', 'Hours worked', 'Hourly wage', 'How much the customers paid', 'If repeat customer or not', 'Additional job notes','Upload image of the invoice','Supplies sold');


            $callback = function() use ($leads,$columns)
            {
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

        }
        else if(isset($exportname) && $exportname == 'csv' && isset($filterFrom) && $filterFrom != '' &&  $filterEnd == ''){

           $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*','completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '>=' , $filterFrom)
            ->get();

            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

           // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
            $columns = array('Id', 'Quote Name','Date of Job','Employees names', 'Hours worked', 'Hourly wage', 'How much the customers paid', 'If repeat customer or not', 'Additional job notes','Upload image of the invoice','Supplies sold');


           $callback = function() use ($leads,$columns)
            {
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

        }else if(isset($exportname) && $exportname == 'csv' && isset($filterEnd) && $filterEnd != '' &&  $filterFrom == ''){

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*','completed_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '<=' , $filterEnd )
            ->get();

            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

           // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
            $columns = array('Id', 'Quote Name','Date of Job','Employees names', 'Hours worked', 'Hourly wage', 'How much the customers paid', 'If repeat customer or not', 'Additional job notes','Upload image of the invoice','Supplies sold');


            $callback = function() use ($leads,$columns)
            {
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

        }else if(isset($exportname) && $exportname == 'csv' && isset($filterFrom) && $filterFrom != '' && isset($filterEnd) && $filterEnd != ''){

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*','completed_leads.*','quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '>=' , $filterFrom)
                ->where('quotes.date_of_job', '<=' , $filterEnd )
            ->get();

           $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=file.csv",
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );

           // $reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
            $columns = array('Id', 'Quote Name','Date of Job','Employees names', 'Hours worked', 'Hourly wage', 'How much the customers paid', 'If repeat customer or not', 'Additional job notes','Upload image of the invoice','Supplies sold');


            $callback = function() use ($leads,$columns)
            {
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

        }
        else if(isset($filterFrom) && $filterFrom != '' &&  $filterEnd == '')
        {

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '>=' , $filterFrom)
            ->get();

        }else if(isset($filterEnd) && $filterEnd != '' &&  $filterFrom == ''){

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '<=' , $filterEnd )
            ->get();
        }
        else if(isset($filterFrom) && $filterFrom != '' && isset($filterEnd) && $filterEnd != '')
        {

        $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
                ->where('quotes.date_of_job', '>=' , $filterFrom)
                ->where('quotes.date_of_job', '<=' , $filterEnd )
            ->get();
        }else{

            $leads = AssignedLeads::join('quotes', 'assigned_leads.lead_id', '=', 'quotes.id')
                ->join('users', 'assigned_leads.franchises', '=', 'users.id')
                ->join('completed_leads', 'completed_leads.lead_id', '=', 'assigned_leads.lead_id')
                ->orderBy('assigned_leads.created_at')
                ->select('assigned_leads.*', 'quotes.name as quote_name', 'quotes.email as quote_email', 'quotes.phone_number as quote_phone_number','quotes.date_of_job as dateofjob', 'quotes.delivery_address as quote_delivery_address', 'quotes.departure_address as quote_departure_address', 'quotes.service_needed as service_needed' , 'quotes.estimate as estimate', 'users.first_name as franchises_first_name', 'users.last_name as franchises_last_name', 'users.email as franchises_email')
            ->get();    
        }

        return view('admin/reports', compact('user', 'leads', 'filterFrom', 'filterEnd'));

    }


}
