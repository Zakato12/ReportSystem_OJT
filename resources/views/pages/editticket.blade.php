@extends('layouts.themes.main')
@section('page-title', 'View Ticket')

@section('content')

    <main class="main-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/tickets')}}">Ticket List</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tickets.view', $details->ticket_id)}}">Ticket Details</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Ticket Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

            
        <div class="content-container">

                <main class="container">
                    <div class="container">
                    <h4 class="text-center mb-4  fw-bold">Ticket Details</h4>
                    {{-- View Ticket Body --}}

                        <form id="viewticketForm" method="POST" action="{{route('ticket.update', $details->ticket_id)}}" aria-label="Add Ticket">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="account">Account</label>
                                        <select name="account" id="account" class="form-select" required>
                                            @foreach ($accounts as $acc)
                                                <option value="{{ $acc->account_id }}"
                                                    @if (old('account', $details->account_id) == $acc->account_id) selected @endif>
                                                    {{ $acc->account_name }}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="complainant">Complainant</label>
                                        <input type="text" class="form-control" name="complainant" id="complainant" value="{{$details->complainant_name}}" required aria-label="Complainant">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="datecreated">Date Created</label>
                                        <input type="text" class="form-control" name="datecreated" id="datecreated" value="{{$details->ticket_date_created}}" required aria-label="Date Created" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="p-3 fw-semibold" for="urgency">Urgency</label>
                                        <select name="urgency" id="urgency" class="form-select">
                                            @foreach ($urgency as $urg)
                                                <option value="{{$urg->urgency_id}}"
                                                    @if (old('urgency', $details->urgency_id) == $urg->urgency_lvl) selected @endif>
                                                    {{$urg->urgency_lvl}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="assignedto">Assigned To</label>
                                        <select name="assignedto" id="assignedto" class="form-select">
                                            @if (is_null($details->ticket_assigned_to))
                                                <option selected value="">--Please Assign a Programmer--</option>
                                            @endif
                                            @foreach ($programmers as $prog)
                                                <option value="{{$prog->user_id}}"
                                                    @if (old('users', $details->ticket_assigned_to) == $prog->user_id) selected @endif>
                                                    {{$prog->user_fname}} {{$prog->user_mname}} {{$prog->user_lname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="dateassigned">Date Assigned</label>
                                        <input type="text" class="form-control" name="dateassigned" id="dateassigned" value="{{$details->ticket_date_assigned}}" required aria-label="Date Assigned" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="ticketstatus">Ticket Status</label>
                                        <select name="ticketstatus" id="ticketstatus" class="form-select">
                                            @foreach ($status as $stat)
                                                <option value="{{$stat->ticket_status_id}}"
                                                    @if (old('tickets', $details->ticket_status_id) == $stat->ticket_status_id) selected @endif>
                                                    {{$stat->ticket_status}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="progressdate">Date on Progress</label>
                                        <input type="text" class="form-control" name="progressdate" id="progressdate" value="{{$details->ticket_date_inprogress}}" required aria-label="Progress Date" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="progress">Validation Date</label>
                                        <input type="text" class="form-control" name="progress" id="progress" value="{{$details->ticket_date_validate}}" required aria-label="Progress" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="datecompleted">Date Completed</label>
                                        <input type="text" class="form-control" name="datecompleted" id="datecompleted" value="{{ $details->ticket_date_completed}}" required aria-label="Date Completed" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group position-relative">
                                <label class="p-3 fw-semibold" for="ticketdescription">Ticket Description</label>
                                <textarea 
                                    class="form-control" 
                                    name="description" 
                                    id="ticketdescription" 
                                    required 
                                    placeholder="Ticket Description"
                                    style="height: 150px;"
                                    required
                                >{{$details->ticket_description}}</textarea>
                            </div>
                                <div class="mt-4 text-end">
                                    <button class="btn btn-success ms-1" type="submit">Update</button>
                                    <a class="btn btn-secondary"  href="{{route('tickets.view' , $details->ticket_id)}}">Cancel</a>
                                </div>
                               
                        </form>
                    </div>
                </main>
        </div>  

    </div>

</main>

        <script>
             document.addEventListener('DOMContentLoaded', function() {

                document.getElementById('openviewTicket').addEventListener('click', function() {
                    var viewticket = new bootstrap.Modal(document.getElementById('viewticketModal'));
                    viewticket.show();
                });

                
            });
        </script>

@endsection