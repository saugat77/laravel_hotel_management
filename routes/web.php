<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardComponent;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
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
    return view('home');
});
//Admin route
Route::get('admin', function () {
    return view('dashboard-component');
});
//roomtype controller
Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomTypeController::class);

//room controller
Route::get('admin/room/{id}/delete',[RoomController::class,'destroy']);

Route::resource('admin/room',RoomController::class);
