<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use App\Quote;
use Illuminate\Http\Request;
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

    
}
