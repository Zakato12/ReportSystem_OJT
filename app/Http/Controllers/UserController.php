<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showdashboard()
{
    if (!session()->has('user_id')) {
        
        return redirect('/login')->with('error', 'Please log in first.');
    }

    return view('pages.dashboard');
}

        
}
