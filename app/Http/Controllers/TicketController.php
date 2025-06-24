<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function viewtickets()
    {
        $tickets = DB::table('tickets')
        ->leftJoin('users', 'tickets.user_id', '=', 'users.user_id')
        ->leftJoin('urgency_status', 'tickets.urgency_id', '=', 'urgency_status.urgency_id')
        // ->leftJoin('complainants', 'tickets.complainant_id', '=', 'complainants.complainant_id')
        ->leftJoin('schools', 'tickets.school_id', '=', 'schools.school_id')
        ->leftJoin('ticket_status', 'tickets.ticket_status_id', '=', 'ticket_status.ticket_status_id')
        ->leftJoin('users as modified', 'tickets.ticket_modified_by', '=', 'modified.user_id')
        ->leftJoin('users as completed', 'tickets.ticket_completed_by', '=', 'completed.user_id')
        ->select('tickets.*', 'users.user_fname as created_by','schools.school_name as school', 'ticket_status.ticket_status as status',  'modified.user_fname as modified_by', 'completed.user_fname as completed_by', 'urgency_status.urgency_status as urgency' )
        // ->where('active', '=', '1')
        ->get();

        $urgency = DB::table('urgency_status')->get();
        $schools = DB::table('schools')->get();

        return view('pages.tickets', [
            'tickets' => $tickets,
            'urgency' => $urgency,
            'schools' => $schools
        ]);
    }

    public function storeticket(Request $request)
    {
        $validated = $request->validate([
            'ticketdescription' => 'required|string',
            'urgency' => 'required|exists:urgency_status,urgency_id',
            'school' => 'required|exists:schools,school_id',
            'complainant' => 'required|string|max:255'
        ]);

        DB::table('tickets')->insert([
            'ticket_date_created' => now(),
            'ticket_remarks' => $validated['ticketdescription'],
            'urgency_id' => (int) $validated['urgency'],
            'school_id' => (int) $validated['school'],
            'complainant' => $validated['complainant']
        ]);
    }
}
