<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
     public function viewassigned(){
        return view("pages.dashboardlists.assigned");
    }

//     public function assignedview(){

//          $tickets = DB::table('tickets')
//             ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
//             ->join('accounts', 'accounts.account_id', 'tickets.account_id')
//             ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
//             ->where('active', '=', 1)
//             ->get(); //for ticket table
            
//         $urgency = DB::table('urgency_status')->get(); //urgency table
//         $accounts = DB::table('accounts')->get(); //accounts table
//         $programmers = DB::table('users')
//             ->where('role_id', '=', 2) //2 = programmer
//             ->get(); //users who are programmers

//         return view('pages.tickets', compact( 'urgency', 'accounts', 'programmers', 'tickets'));

// }
}
