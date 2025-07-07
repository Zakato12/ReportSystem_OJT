<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\returnArgument;
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

    public function updateUsers(request $request, $user_id){

//    $users = DB::table('users')
//             ->where('user_id', $user_id)
//             ->get();

        $updateusers = [
            'created_at' => $request['created_at'],
            'user_email' => $request['user_email'],
            'user_fname' => $request['user_fname'],
            'user_lname' => $request['user_lname'],
            'user_mname' => $request['user_mname']
        ];

         DB::table('users')
        ->where('user_id', $user_id)
        ->update(
            $updateusers
        );
        
        return redirect()->route('viewuser')->with('success', 'Ticket Updated Successfully');

    }
        
    
        

        public function editpassword(Request $request)
        {
            $validated = $request->validate([
                'currpassword' => 'required|string',
                'newpassword' => 'required|string|min:8',
                'confirmpassword' => 'required|string'
            ]);

            $user_pass = DB::table('users')
            ->where('user_id', session('user_id'))
            ->select('user_password');

            if($validated['currpassword'] == $user_pass)
            {
                if($validated['newpassword'] == $validated['confirmpassword'])
                {
                    DB::table('users')
                    ->where('user_id',session('user_id'))
                    ->update(['user_passowrd' => $validated['confirmpassword']]);

                    return view('pages.dashboard')->with('success', 'Your Password has been updated.');
                }
                return redirect()->back()->with('error', 'Password is Invalid');
            }
            return redirect()->back()->with('error', 'Password is Invalid');
        }

}
