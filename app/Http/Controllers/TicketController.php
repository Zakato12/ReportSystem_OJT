<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{
    public function viewtickets()
    {
        
        $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 1)
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
            $ticketData['ticket_date_assigned'] = Carbon::now();
        }
        else
        {
            $ticketData['ticket_status_id'] = 1;
            
        }

        DB::table('tickets')->insert($ticketData);

        alert('Success! Ticket Added', 'success');
        return redirect()->back()->with('success', 'Ticket created successfully.');
        
    }

    public function ticketdetails($ticket_id)
    {
        $details = DB::table('tickets')
            ->where('ticket_id', $ticket_id)
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->first(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $status = DB::table('ticket_status')->get();//status table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.viewticketdetails', compact('details', 'urgency', 'accounts', 'programmers', 'status'));
    }

    public function edit($ticket_id)
    {
         $details = DB::table('tickets')
            ->where('ticket_id', $ticket_id)
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->first(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $status = DB::table('ticket_status')->get();//status table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers


        return view('pages.editticket', compact('details', 'urgency', 'accounts', 'programmers', 'status'));
    }

    public function updateticket(Request $request, $ticket_id)
    {

        $ticket = DB::table('tickets')
            ->where('ticket_id', $ticket_id)
            ->get('ticket_status_id');

        
        $updatedticket = [
            'urgency_id' => (int)$request['urgency'],
            'account_id' => (int)$request['account'],
            'complainant_name' => $request['complainant'],
            'ticket_assigned_to' => (int)$request['assignedto'],
            'ticket_status_id' => (int)$request['ticketstatus'],
            'ticket_description' => $request['description']
        ];

        if($updatedticket['ticket_status_id'] !== (int) $ticket[0]->ticket_status_id)
        {
                switch ($updatedticket['ticket_status_id']) {
                case 2:
                    $updatedticket['ticket_date_assigned'] = Carbon::now();
                    break;
                case 3:
                    $updatedticket['ticket_date_inprogress'] = Carbon::now();
                    break;
                case 4:
                    $updatedticket['ticket_date_validate'] = Carbon::now();
                    break;
                case 5:
                    $updatedticket['ticket_date_completed'] = Carbon::now();
                    break; 
           
            }
        }
        //dd($request->all());
        DB::table('tickets')
        ->where('ticket_id', $ticket_id)
        ->update(
            $updatedticket
        );
        
        return redirect()->route('tickets.view', $ticket_id)->with('success', 'Ticket Updated Successfully');

    }

    public function delete( $ticket_id)
    {
        DB::table('tickets')
            ->where('ticket_id', '=', $ticket_id)
            ->update(['active' => '2']);

        toast('Success! Ticket Archived.', 'success');
       return redirect()->back()->with('success', 'Ticket deleted successfully!');
    }

     public function viewarchive()
    {
        
        $tickets = DB::table('tickets')
            ->join('urgency_status', 'urgency_status.urgency_id', 'tickets.urgency_id')
            ->join('accounts', 'accounts.account_id', 'tickets.account_id')
            ->join('ticket_status', 'ticket_status.ticket_status_id', 'tickets.ticket_status_id')
            ->where('active', '=', 2)
            ->get(); //for ticket table
            
        $urgency = DB::table('urgency_status')->get(); //urgency table
        $accounts = DB::table('accounts')->get(); //accounts table
        $programmers = DB::table('users')
            ->where('role_id', '=', 2) //2 = programmer
            ->get(); //users who are programmers

        return view('pages.archive', compact( 'urgency', 'accounts', 'programmers', 'tickets'));
    }

    
    public function restore( $ticket_id)
    {
        DB::table('tickets')
            ->where('ticket_id', '=', $ticket_id)
            ->update(['active' => '1']);

        toast('Success! Ticket Restore.', 'success');
       return redirect()->back()->with('success', 'Ticket Restored successfully!');
    }
}
