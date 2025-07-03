@extends('layouts.themes.main')
@section('page-title', 'Tickets')

@section('content')
    
    <main class="main-content">
        <div class="container-fluid">
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">Ticket List</h2>
                    <div class="table-actions d-flex align-items-center">
                        <div class="search-box me-2 d-flex align-items-center">
                            <i class="bi bi-search me-1"></i>
                            <input type="text" class="form-control" placeholder="Search ticket...">
                        </div>
                        <button class="btn btn-primary" id="openaddTicket" aria-label="Open Add Ticket">
                            <i class="bi bi-plus-lg"></i> Add Ticket
                        </button>
                        <a class="btn btn-sm btn-outline-primary" href="{{url('/archive')}}">Archive</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="ticket-table">
                        <thead class="table-light">
                            <tr>
                                <th>Date Created</th>
                                <th>Urgency</th>
                                <th>Ticket Description</th>
                                <th>Ticket Status</th>
                                <th>School</th>
                                <th>Complainant</th>
                                <th class="text-end">Actions<i class="bi bi-gear-fill ms-3"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>  
                                    <td>{{ $ticket->ticket_date_created}}</td>
                                    <td>{{ $ticket->urgency_lvl}}</td>
                                    <td>{{ $ticket->ticket_description}}</td>
                                    <td>{{ $ticket->ticket_status}}</td>
                                    <td>{{ $ticket->account_name}}</td>
                                    <td>{{ $ticket->complainant_name}}</td>
                                    <td>
                                        <div class=" container-fluid text-end">
                                            
                                            <form action="{{route('ticket.delete' , $ticket->ticket_id)}}" method="POST" >
                                                {{csrf_field()}}
                                                <a class="btn btn-sm btn-outline-primary" id="openviewtickets" data-bs-toggle="modal" data-bs-target="editticketModal{{ $ticket->ticket_id }}">Edit</a> 
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger " type="submit" id="opendeleteTicket" onclick="return confirm('Are you Sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
    {{-- Delete Confirmation Modal --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this ticket?
      </div>
      <div class="modal-footer">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.openDeleteModal');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const ticketId = this.getAttribute('data-ticket-id');
                deleteForm.action = `/tickets/delete/${ticketId}`;
            });
        });
    });
</script>
    <script>
  $(document).ready(function () {
    $('#ticket-table').DataTable();
  });
</script>

@foreach ($tickets as $ticket)
    <div class="modal fade modal-lg" id="editticketModal{{ $ticket->ticket_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ticket->ticket_id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="editticketModalLabel{{ $ticket->ticket_id }}">Edit Ticket</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- Add Ticket Body --}}
                    <div class="modal-body">
                        <form id="adduserForm" method="POST" action="{{route('ticket.update', $ticket->ticket_id)}}">
                            {{csrf_field()}}
                                    @method('POST')
                                    <div class="row">
                                    <div class="col-4">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="account{{ $ticket->ticket_id }}">Account</label>
                                            <select name="account" id="account" class="form-select" required>
                                                @foreach ($accounts as $acc)
                                                    <option value="{{ $acc->account_id }}"
                                                        @if (old('account', $ticket->account_id) == $acc->account_id) selected @endif>
                                                        {{ $acc->account_name }}
                                                    </option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="complainant{{ $ticket->ticket_id }}">Complainant</label>
                                            <input type="text" class="form-control" name="complainant" id="complainant" value="{{$ticket->complainant_name}}" required aria-label="Complainant">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="datecreated{{ $ticket->ticket_id }}">Date Created</label>
                                            <input type="text" class="form-control" name="datecreated" id="datecreated" value="{{$ticket->ticket_date_created}}" required aria-label="Date Created" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="p-3 fw-semibold" for="urgency{{ $ticket->ticket_id }}">Urgency</label>
                                            <select name="urgency" id="urgency" class="form-select">
                                                @foreach ($urgency as $urg)
                                                    <option value="{{$urg->urgency_id}}"
                                                        @if (old('urgency', $ticket->urgency_id) == $urg->urgency_lvl) selected @endif>
                                                        {{$urg->urgency_lvl}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="assignedto{{ $ticket->ticket_id }}">Assigned To</label>
                                            <select name="assignedto" id="assignedto" class="form-select">
                                                @if (is_null($ticket->ticket_assigned_to))
                                                    <option selected value="">--Please Assign a Programmer--</option>
                                                @endif
                                                @foreach ($programmers as $prog)
                                                    <option value="{{$prog->user_id}}"
                                                        @if (old('users', $ticket->ticket_assigned_to) == $prog->user_id) selected @endif>
                                                        {{$prog->user_fname}} {{$prog->user_mname}} {{$prog->user_lname}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="dateassigned{{ $ticket->ticket_id }}">Date Assigned</label>
                                            <input type="text" class="form-control" name="dateassigned" id="dateassigned" value="{{$ticket->ticket_date_assigned}}" required aria-label="Date Assigned" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="ticketstatus{{ $ticket->ticket_id }}">Ticket Status</label>
                                            <select name="ticketstatus" id="ticketstatus" class="form-select">
                                                @foreach ($status as $stat)
                                                    <option value="{{$stat->ticket_status_id}}"
                                                        @if (old('tickets', $ticket->ticket_status_id) == $stat->ticket_status_id) selected @endif>
                                                        {{$stat->ticket_status}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="progressdate{{ $ticket->ticket_id }}">Date on Progress</label>
                                            <input type="text" class="form-control" name="progressdate" id="progressdate" value="{{$ticket->ticket_date_inprogress}}" required aria-label="Progress Date" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="progress{{ $ticket->ticket_id }}">Validation Date</label>
                                            <input type="text" class="form-control" name="progress" id="progress" value="{{$ticket->ticket_date_validate}}" required aria-label="Progress" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group position-relative">
                                            <label class="p-3 fw-semibold" for="datecompleted{{ $ticket->ticket_id }}">Date Completed</label>
                                            <input type="text" class="form-control" name="datecompleted" id="datecompleted" value="{{ $ticket->ticket_date_completed}}" required aria-label="Date Completed" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <label class="p-3 fw-semibold" for="ticketdescription{{ $ticket->ticket_id }}">Ticket Description</label>
                                    <textarea 
                                        class="form-control" 
                                        name="description" 
                                        id="ticketdescription" 
                                        required 
                                        placeholder="Ticket Description"
                                        style="height: 150px;"
                                        required
                                    >{{$ticket->ticket_description}}</textarea>
                                </div>
                                    <div class="mt-4 text-end">
                                        <button class="btn btn-success ms-1" type="submit">Update</button>
                                        <a class="btn btn-secondary"  href="{{route('tickets')}}">Cancel</a>
                                    </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
@include('pages.ticketsmodals')

