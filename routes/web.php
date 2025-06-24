<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.Login');
});

//Dashboard
Route::get('/dashboard', [UserController::class, 'showdashboard'])->name('dashboard');

//Ticket List Page
Route::get('/tickets',[TicketController::class, 'viewtickets'])->name('tickets');

//Creating and Storing the Tickets
// Route::get('/tickets', [TicketController::class, 'createticket']);
Route::post('/tickets', [TicketController::class, 'storeticket']);

//Login
Route::get('/login', [PageController::class, 'Login'])->name('showlogin');
Route::post('/login', [LoginController::class, 'login']);

//Logout
Route::post('/logout', [LoginController::class, 'logout']);