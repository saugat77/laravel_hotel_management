<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardComponent;
use App\Http\Controllers\RoomTypeController;
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
Route::get('/dashboard', DashboardComponent::class);
Route::get('/', function () {
    return view('layouts.home');
});
//Admin route 
Route::get('admin', function () {
    return view('layouts.layout');
});
//roomtype controller 
Route::resource('admin/roomtype',RoomTypeController::class);


