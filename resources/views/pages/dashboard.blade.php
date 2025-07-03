@extends('layouts.themes.main')
@section('page-title', 'Dashboard')

@section('content')
    <main class="main-content d-flex justify-content-center align-items-center" style="min-height: 25vh">
    <div class="container mx-auto">
        <h2 class="mb-4">Welcome!</h2>

        <div class="row mb-4">
            <div class="col mb-2">
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-success">Unassigned Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::unassignedTicketsCount() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-info mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-info">Assigned Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::assignedTicketsCount() }}
                                </span>
                               <a class="btn btn-sm btn-outline-primary" id="openviewTicket" href="{{url('/assigned')}}">Assigned</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">In Progress Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::inprogressTicketsCount() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">For Verification Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::forverificationTicketsCount() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">Completed Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::closedTicketsCount() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection