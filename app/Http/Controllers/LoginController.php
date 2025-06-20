<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use DB;
use Symfony\Component\CssSelector\Node\ElementNode;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user_name = $request->input('username');
        $password = $request->input('password');

        $users = DB::table('users')
        ->where('user_name',$user_name)
        // ->where('role_id', '=', $password)
        // ->where('user_active', '=', '1')
        ->first();

        if($users)
        {
            session()->put('user_id', $users->user_id);
            session()->put('user_name', $users->user_name);
            session()->put('role_id',$users->role_id);
            session()->put('user_fname', $users->user_fname);
            session()->put('user_mname', $users->user_mname);
            session()->put('user_lname', $users->user_lname);

            return redirect()->action([UserController::class, 'showdashboard']);
        }
        else
        {
            return redirect()->action([PageController::class, 'Login']);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        
        return redirect()->route('showlogin')->with('success', 'Logged out Successfully.');
    }
}
