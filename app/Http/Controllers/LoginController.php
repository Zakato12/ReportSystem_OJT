<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use DB;
use Symfony\Component\CssSelector\Node\ElementNode;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user_email = $request->input('username');
        $password = $request->input('password');

        $users = DB::table('users')
        ->where('user_email',$user_email)
        ->where('user_password',$password)
        // ->where('user_active', '=', '1')
        ->first();

        if($users)
        {
            session()->put('user_id', $users->user_id);
            session()->put('user_email', $users->user_email);
            session()->put('role_id',$users->role_id);
            session()->put('user_fname', $users->user_fname);
            session()->put('user_mname', $users->user_mname);
            session()->put('user_lname', $users->user_lname);
            session()->put('user_fullname', $users->user_fname . ' ' . $users->user_mname . ' ' . $users->user_lname);

            return redirect()->action([UserController::class, 'showdashboard']);
        }
        else
        {
            // alert('Invalid email or password.');
            return redirect()->action([PageController::class, 'Login'])->with('error','Invalid username/password!');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('showlogin')->with('success', 'Logged out successfully.');
    }
}
