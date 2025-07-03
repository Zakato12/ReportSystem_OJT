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
                <div class="table-responsive" id="ticket-table">
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
                                            
                                            <form>
                                                <a class="btn btn-sm btn-outline-primary" href="{{route('tickets.edit' , $ticket->ticket_id)}}">View/Edit</a> 
                                                <button type="button"
                                                class="btn btn-sm btn-outline-danger openDeleteModal"
                                                data-ticket-id="{{ $ticket->ticket_id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal">
                                                Delete
                                                </button>
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

@endsection
@include('pages.ticketsadd')

