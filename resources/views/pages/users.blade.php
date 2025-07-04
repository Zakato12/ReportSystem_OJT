@extends('layouts.themes.main')
@section('page-title', 'Users')

@section('content')
 <main class="main-content">
    <div class="container-fluid">
            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">User List</h2>
                    <div class="table-actions d-flex align-items-center">
                        <div class="search-box me-2 d-flex align-items-center">
                            <i class="bi bi-search me-1"></i>
                            <input type="text" class="form-control" placeholder="Search Users...">
                        </div>
                        @if (session('user_id') == 1)
                            <button class="btn btn-primary" id="openaddUser" aria-label="Open Add user">
                                <i class="bi bi-plus-lg"></i> Add User
                            </button>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Username</th>
                               
                                <th>User First Name</th>
                                <th>User Middle Name</th>
                                <th>User Last Name</th>
                                <th>Date Created</th>
                                @if (session('user_id') == 1)
                                    <th class="text-end">Actions<i class="bi bi-gear-fill ms-3"></i></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>  
                                    <td>{{ $user->user_email}}</td>
                                    
                                    <td>{{ $user->user_fname}}</td>
                                    <td>{{ $user->user_mname}}</td>
                                    <td>{{ $user->user_lname}}</td>
                                    <td>{{ $user->created_at}}</td>
                                    <td>
                                        <div class=" container-fluid text-end">

                                        @if (session('user_id') == 1)
                                                {{--<form action="{{route('ticket.delete' , $ticket->ticket_id)}}" method="POST" >
                                                {{csrf_field()}} --}}
                                                <a class="btn btn-sm btn-outline-primary" id="openviewTicket" href="{{route('viewuser')}}">Edit</a> 
                                                {{-- @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger " type="submit" id="opendeleteTicket" onclick="return confirm('Are you Sure?')">Delete</button> --}}
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
 @include('pages.addusers')
@endsection