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
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                    
                                <th>Date Created</th>
                                <th>Urgency</th>
                                <th>Ticket Description</th>
                                <th>Ticket Status</th>
                                <th>School</th>
                                <th>Complainant</th>
                                <th class="text-center"><i class="bi bi-gear-fill"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    
                                    <td >{{ $ticket->ticket_date_created}}</td>
                                    <td>{{ $ticket->urgency_lvl}}</td>
                                    <td>{{ $ticket->ticket_description}}</td>
                                    <td>{{ $ticket->ticket_status}}</td>
                                    <td>{{ $ticket->account_name}}</td>
                                    <td>{{ $ticket->complainant_name}}</td>
                                    <td>
                                        <div class="container-fluid">
                                            <button class="btn btn-primary ms-1 p-1" id="openviewTicket">View</button>
                                            <button class="btn btn-danger ms-1 p-1" id="opendeleteTicket">Delete</button>
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
@endsection
@include('layouts.partials.modals')