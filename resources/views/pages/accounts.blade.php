@extends('layouts.themes.main')
@section('page-title', 'Accounts')

@section('content')
    <main class="main-content">
        <div class="container-fluid">
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">Account List</h2>
                    <div class="table-actions d-flex align-items-center">
                        <div class="search-box me-2 d-flex align-items-center">
                            <i class="bi bi-search me-1"></i>
                            <input type="text" class="form-control" placeholder="Search account...">
                        </div>
                        @if (session('user_id') == 1)
                            <button class="btn btn-primary" id="openaddAccount" aria-label="Open Add Account">
                                <i class="bi bi-plus-lg"></i> Add Account
                            </button>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Account Name</th>
                                @if (session('user_id') == 1)
                                    <th class="text-end">Actions<i class="bi bi-gear-fill ms-3"></i></th>
                                @endif
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>  
                                    <td>{{ $account->account_name}}</td>
                                   
                                    <td>
                                        <div class=" container-fluid text-end">
                                            @if (session('user_id') == 1)
                                                {{-- <form action="{{route('ticket.delete' , $ticket->ticket_id)}}" method="POST" >
                                                {{csrf_field()}} --}}
                                                <a class="btn btn-sm btn-outline-primary" id="openviewAccount" href="{{route('viewaccounts' )}}">Delete/Edit</a> 
                                                {{-- @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger " type="submit" id="opendeleteTicket" onclick="return confirm('Are you sure?')">Delete</button> --}}
                                                </form>
                                            @endif
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          {{-- <a class="btn btn-sm btn-outline-primary" href="{{url('/archive')}}">archive</a>  --}}
    </main>
@include('pages.addacounts')
@endsection

