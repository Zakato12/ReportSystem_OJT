@extends('layouts.themes.main')
@section('page-title', 'Dashboard')

@section('content')
    <main class="main-content d-flex justify-content-center align-items-center" style="min-height: 25vh">
    <div class="container mx-auto">
        <h2 class="mb-4">Welcome!</h2>

        <div class="row mb-4">
            <div class="col mb-2">
                <div class="card border-danger mb-3">
                    <a class="btn card-body" href="{{url('/unssigned')}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-danger">Unassigned Tickets</h6>
                                <span class="badge bg-danger">
                                    {{ \App\Http\Controllers\dashboardController::unassignedTicketsCount() }}
                                </span>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <a class="btn card-body" href="{{url('/assigned')}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">Assigned Tickets</h6>
                                <span class="badge bg-warning">
                                    {{ \App\Http\Controllers\dashboardController::assignedTicketsCount() }}
                                </span>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-info mb-3">
                   <a class="btn card-body" href="{{url('/progress')}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-info">In-Progress Tickets</h6>
                                <span class="badge bg-info">
                                    {{ \App\Http\Controllers\dashboardController::inprogressTicketsCount() }}
                                </span>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-primary mb-3">
                    <a class=" btn card-body" href="{{ url('/validate') }}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-primary">For Verification Tickets</h6>
                                <span class="badge bg-primary">
                                    {{ \App\Http\Controllers\dashboardController::forverificationTicketsCount() }}
                                </span>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-success mb-3">
                    <a class="btn card-body" href="{{url('/completed')}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-success">Completed Tickets</h6>
                                <span class="badge bg-success">
                                    {{ \App\Http\Controllers\dashboardController::closedTicketsCount() }}
                                </span>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection