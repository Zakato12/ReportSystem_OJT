@extends('layouts.themes.main')
@section('page-title', 'Dashboard')

@section('content')
    <main class="main-content d-flex justify-content-center align-items-center" style="min-height: 80vh">
    <div class="container mx-auto">
        <h2 class="mb-4">Welcome!</h2>

        <div class="row mb-4">
            <div class="col mb-3">
                <div class="card border-success mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-success">Tickets Completed</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card border-info mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-info">Tickets in Progress</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card border-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <h6 class="card-title text-warning">Pending Tickets</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection