<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Symfony\Component\Console\Command\CompleteCommand;

class PageController extends Controller
{
    public function Login()
    {
        return view('auth.Login');
    }
}
