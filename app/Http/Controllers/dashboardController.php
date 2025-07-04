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
}
