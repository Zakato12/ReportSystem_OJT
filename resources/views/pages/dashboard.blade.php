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
                                <h6 class="card-title text-success">Unissigned Tickets</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-info mb-3">
                    <a class="btn card-body" href="{{url('/assigned')}}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-info">Assigned Tickets</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">In Progress Tickets</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <a class=" btn card-body" href="{{ url('/tickets/for-validation') }}">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">For Verification Tickets</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">Completed Tickets</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection