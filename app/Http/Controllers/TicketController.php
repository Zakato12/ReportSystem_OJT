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
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.tickets', compact( 'urgency', 'accounts', 'programmers', 'tickets'));
    }

    public function storeticket(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'ticketdescription' => 'required|string',
            'urgency' => 'required|integer',
            'accounts' => 'required|integer',
            'complainant' => 'required|string|max:255',
            'programmer' => 'nullable|integer'
        ]);

        $ticketData = [
            'ticket_date_created' => Carbon::now(),
            'ticket_description' => $validated['ticketdescription'],
            'urgency_id' => (int) $validated['urgency'],
            'account_id' => (int) $validated['accounts'],
            'complainant_name' => $validated['complainant'],
            'ticket_created_by' => session('user_id'),
            'ticket_assigned_to' => $validated['programmer'] ?? null,
            'active' => 1
        ];
        if($ticketData['ticket_assigned_to'] !== null)
        {
            $ticketData['ticket_status_id'] = 2;
        }
        else
        {
            $ticketData['ticket_status_id'] = 1;
        }

        DB::table('tickets')->insert($ticketData);
        return redirect()->back()->with('success', 'Ticket created successfully.');
    }

    public function ticketdetails($tikcet_id)
    {
        $details = DB::table('tickets')
            ->where('tikcet_id', $tikcet_id)
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.viewticketdetails');
    }
}
