<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{

        public function unassignedview(){

         $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
            ->where('ticket_status.ticket_status_id', 1)
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.dashboardlists.Unassigned', compact( 'urgency', 'accounts', 'programmers', 'tickets'));

}
    public function assignedview(){

         $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
            ->where('ticket_status.ticket_status_id', 2)
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.dashboardlists.assigned', compact( 'urgency', 'accounts', 'programmers', 'tickets'));

}
    public function progressview(){

         $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
            ->where('ticket_status.ticket_status_id', 3)
            ->get();
            
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.dashboardlists.inprogress', compact( 'urgency', 'accounts', 'programmers', 'tickets'));

}
    public function validateview(){

         $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
            ->where('ticket_status.ticket_status_id', 4)
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.dashboardlists.validation', compact( 'urgency', 'accounts', 'programmers', 'tickets'));

}
    public function completedview(){

         $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
            ->where('ticket_status.ticket_status_id', 5)
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.dashboardlists.closed', compact( 'urgency', 'accounts', 'programmers', 'tickets'));


}
    public static function unassignedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('active','1')
            ->where('tickets.ticket_status_id', '=', 1)
            ->count();
    }

    public static function assignedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('active','1')
            ->where('tickets.ticket_status_id', '=', 2)
            ->count();
    }

    public static function inprogressTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('active','1')
            // ->where('ticket_assigned_to',session('user_id'))
            ->where('tickets.ticket_status_id', '=', 3)
            ->count();
    }

    public static function forverificationTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 4)
            ->where('active','1')
            ->count();
    }

    public static function closedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('active','1')
            ->where('tickets.ticket_status_id', '=', 5)
            ->count();
    }
}
