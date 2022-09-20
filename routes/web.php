<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/tickets');
});

Route::resource('tickets', TicketController::class);
Route::get('tickets/downloadPDF/{id}', [TicketController::class,'downloadPDF']);


Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/check', [AdminController::class, 'checkin'])->middleware('auth');
Route::get('/admin/report', [AdminController::class, 'report'])->middleware('auth');
Route::post('/admin/checked', [AdminController::class, 'checked'])->middleware('auth');
Route::get('/admin/{ticket}/edit', [AdminController::class, 'edit']);
Route::put('admin/{ticket}/update', [AdminController::class, 'update']);


Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);