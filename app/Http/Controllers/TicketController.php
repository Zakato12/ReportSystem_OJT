<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function viewtickets()
    {
        $tickets = DB::table('tickets')
            ->get();

        $urgency = DB::table('urgency_status')->get();
        $accounts = DB::table('accounts')->get();
        $programmers = DB::table('users')
            ->where('role_id', '=', 2)
            ->get();

        // return view('pages.tickets', [
        //     'tickets' => $tickets,
        //     'urgency' => $urgency,
        //     'schools' => $schools
        // ]);
        return view('pages.tickets', compact( 'urgency', 'accounts', 'programmers', 'tickets'));
    }

    public function createticket()
    {

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
