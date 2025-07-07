<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\dashboardController;
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

//Login
Route::get('/login', [PageController::class, 'Login'])->name('showlogin');
Route::post('/login', [LoginController::class, 'login']);

//Logout
Route::post('/logout', [LoginController::class, 'logout']);

//Dashboard
Route::get('/dashboard', [UserController::class, 'showdashboard'])->name('dashboard');

//Ticket List Page
Route::get('/tickets',[TicketController::class, 'viewtickets'])->name('tickets');

//Ticket Details
// Route::get('/tickets/{ticket_id}', [TicketController::class, 'ticketdetails'])->name('tickets.view');

//Creating and Storing the Tickets
Route::post('/tickets', [TicketController::class, 'storeticket']);

//Ticket Edit
Route::post('/tickets/{ticket_id}', [TicketController::class, 'updateticket'])->name('tickets.update');

//Archiving tickets
Route::delete('/tickets/delete/{ticket_id}',[TicketController::class, 'delete'])->name('ticket.delete');

route::get('/archive',[TicketController::class,'viewarchive']);

Route::post('/restore{ticket_id}',[TicketController::class, 'restore'])->name('restore');

//Users
Route::get('/user', [UserController::class, 'viewuser'])->name('viewuser');
Route::post('/adduser', [UserController::class, 'adduser'])->name('add.user');

//Accounts
Route::get('/accounts',[AccountsController::class, 'viewAccounts'])->name('viewaccounts');
Route::post('/addaccounts', [AccountsController::class, 'addaccounts']);
//Account Details
Route::get('/accounts/{account_id}', [AccountsController::class, 'accountdetails'])->name('accounts.view');
//Account Edit
Route::get('/accounts/{account_id}/edit', [AccountsController::class, 'edit'])->name('accounts.edit');
Route::post('/accounts/{account_id}', [AccountsController::class, 'updateaccount'])->name('accounts.update');

//for dashboard
//view assigned
Route::get('/assigned', [dashboardController::class, 'assignedview']);
//view unassigned
Route::get('/unssigned', [dashboardController::class, 'unassignedview']);
//view inprogress
Route::get('/progress', [dashboardController::class, 'progressview']);
//view validation
Route::get('/validate', [dashboardController::class, 'validateview']);
// view completed 
Route::get('/completed', [dashboardController::class, 'completedview']);

