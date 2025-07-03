<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AccountsController extends Controller
{
public function viewAccounts()
    {
      
    $accounts = DB::table('accounts')->get();
    return view('pages.accounts', compact('accounts'));
    }


public function addaccounts(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'account_name' => 'required|string', 
        ]);

        $kaniData = [
            'account_name' => $validated['account_name'],
            'status' => 1
        ];

        DB::table('accounts')->insert($kaniData);

        return redirect()->back()->with('success', 'User created successfully.');
    }
}