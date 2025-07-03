@extends('layouts.themes.main')
@section('page-title', 'Archive')

@section('content')
    <main class="main-content">
        <div class="container-fluid">
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">Archive List</h2>
                    <div class="table-actions d-flex align-items-center">
                        <div class="search-box me-2 d-flex align-items-center">
                            <i class="bi bi-search me-1"></i>
                            <input type="text" class="form-control" placeholder="Search ticket...">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
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
                                            
                                            <form action="{{route('restore' , $ticket->ticket_id)}}" method="POST" >
                                                {{csrf_field()}}
                                                <button class="btn btn-sm btn-outline-danger " type="submit" id="opendeleteTicket" onclick="return confirm('Are you Sure?')">Restore</button>
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
@endsection