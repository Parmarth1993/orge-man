<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use App\Quote;
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

    public function delete(Request $request) {
        $id = $request['id'];
        $quotes = Quote::Where('id', $id)->delete();
        return redirect('/admin/quotes')->with('success', 'Quote has been deleted successfully.');
    }
}
