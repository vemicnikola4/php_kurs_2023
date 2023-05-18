<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\custom_auth_controller;
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
    return view('welcome');
});
Route::get('/login',[custom_auth_controller::class,'login']);
Route::get('/registration',[custom_auth_controller::class,'registration']);
Route::post('register_user',[custom_auth_controller::class,'register_user'])->name('register_user');