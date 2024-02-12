<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

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

Route::group(['middleware' => 'revalidate'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('auth');;
    Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
    Route::resource('/dashboard/order', 'App\Http\Controllers\OrderController')->middleware('admin');
    Route::resource('/dashboard/approve', 'App\Http\Controllers\ApproveController')->middleware('approver');
    Route::resource('/dashboard/finalapprove', 'App\Http\Controllers\FinalApproveController')->middleware('approver');
});



