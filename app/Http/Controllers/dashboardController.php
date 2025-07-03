<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function viewassigned()
    {
        return view("pages.dashboardlists.assigned");
    }
    // public static function unassignedtickets()
    // {
    //     $unassignedtickets = DB::table('tickets')
    //         ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
    //         ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
    //         ->where('tickets.ticket_status_id', '=', 1)
    //         ->count(); // Count the number of unassigned tickets

    //     return view('pages.dashboardlists.unassigned', compact('unassignedtickets'));
    // }
    public static function unassignedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 1)
            ->count();
    }

    public static function assignedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 2)
            ->count();
    }

    public static function inprogressTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 3)
            ->count();
    }

    public static function forverificationTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 4)
            ->count();
    }

    public static function closedTicketsCount()
    {
        return DB::table('tickets')
            ->select('tickets.ticket_id') // Select the ticket_id or any other field you need
            ->join('ticket_status', 'ticket_status.ticket_status_id', '=', 'tickets.ticket_status_id')
            ->where('tickets.ticket_status_id', '=', 5)
            ->count();
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
