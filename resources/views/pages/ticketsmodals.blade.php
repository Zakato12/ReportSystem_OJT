<div class="container">
    {{-- Add Ticket --}}
    <div class="modal fade modal-lg" id="addticketModal" tabindex="-1" aria-labelledby="addticket" aria-hidden="true" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="addticketModalLabel">New Ticket</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Add Ticket Body --}}
                <div class="modal-body">
                    <form id="addticketForm" method="POST"  action="{{url('/tickets')}}" aria-label="Add Ticket">
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label class="required-field p-2 fw-semibold" for="complainant">Complainant</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="complainant" 
                                            id="complainant" 
                                            required 
                                            aria-label="Complainant Name"
                                            placeholder="Complainant Name">
                                    </div>
                                </div>
                                <div class="col-6">
                                        <div class="form-group position-relative">
                                            <label  class="required-field p-2 fw-semibold" for="accounts">Accounts</label>
                                            <select name="accounts" id="accounts" class="form-select">
                                                <option selected>--SELECT ACCOUNT--</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->account_id}}"> {{$account->account_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group position-relative">
                                    <label  class="required-field p-2 fw-semibold" for="urgency">Urgency</label>
                                    {{-- <input type="text" class="form-control" name="urgency" id="urgency" required aria-label="Urgency"> --}}
                                    <select name="urgency" id="urgency" class="form-select">
                                        <option selected>--SELECT URGENCY--</option>
                                    @foreach ($urgency as $urgencies)
                                        <option  value="{{$urgencies->urgency_id}}" >{{$urgencies->urgency_lvl}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                </div>
                                <div class="col-6">
                                     <div class="form-group position-relative">
                                    <label class="p-2 fw-semibold" for="programmer">Assigned to</label>
                                    <select name="programmer" id="programmer" class="form-select">
                                        <option selected value=" ">--SELECT PROGRAMMER--</option>
                                        @foreach ($programmers as $prog)
                                            <option value="{{$prog->user_id}}">{{$prog->user_fname}} {{$prog->user_mname}} {{$prog->user_lname}}</option>
                                        @endforeach
                                    </select>
                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group position-relative">
                                    <label class="required-field p-2 fw-semibold" for="ticketdescription">Ticket Description</label>
                                    <textarea 
                                        type="text" 
                                        class="form-control" 
                                        name="ticketdescription" 
                                        id="ticketdescription" 
                                        required aria-label="Ticket Description"
                                        style="height: 150px;"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="clearfix">
                                <button type="button" class=" btn btn-mute float-end" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary float-sm-end" id="addSuccess">Add</button>
                                
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($tickets as $ticket)
    <div class="modal fade modal-lg" id="editticketModal{{ $ticket->ticket_id }}" aria-labelledby="editticketmodalLabe{{ $ticket->ticket_id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-text text-center" id="editticketModalTitle{{ $ticket->ticket_id }}">Edit Ticket</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <a class="btn btn-secondary" href="{{ route('tickets') }}">Back</a>

                                </div>
                        </form> 
                    </div>               
            </div>
        </div>
    </div>

@endforeach

<style>
.required-field::after {
    content: " *";
    color: #e74c3c;
}

</style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open Add Modal
            document.getElementById('openaddTicket').addEventListener('click', function() {
                var addticket = new bootstrap.Modal(document.getElementById('addticketModal'));
                addticket.show();
            });
    });
    </script>