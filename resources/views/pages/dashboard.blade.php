@extends('layouts.themes.main')
@section('tittle', 'Dashbaoard')

@section('content')
    <p>Hello,{{session('user_fname')}}!</p>

    <form action="{{url('/logout')}}" method="POST">
        {{csrf_field()}}
        <button class="btn btn-link text-dark" type="submit">Logout</button>
    </form>
@endsection