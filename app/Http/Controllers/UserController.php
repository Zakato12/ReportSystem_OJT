<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserController extends Controller
{
    public function showdashboard()
{
    if (!session()->has('user_id')) {
        
        return redirect('/login')->with('error', 'Please log in first.');
    }

    return view('pages.dashboard');
}
    public function viewuser()
    {
      
        $users = DB::table('users')->get();
    return view('pages.users', compact('users'));
    }

 public function adduser(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'user_fname' => 'required|string',
            'user_lname' => 'required|string',
            'user_email' => 'required|string',
            'user_password' => 'required|string',
            'user_mname' => 'nullable|string'
        ]);

        $userData = [
            'created_at' => Carbon::now(),
            'user_fname' => $validated['user_fname'],
            'user_mname' => $validated['user_mname'],
            'user_lname' => $validated['user_lname'],
            'user_email' => $validated['user_email'],
            'user_password' =>$validated['user_password'],
            'role_id' => 2
        ];

        DB::table('users')->insert($userData);

        return redirect()->back()->with('success', 'User created successfully.');
        
    }
        
}
