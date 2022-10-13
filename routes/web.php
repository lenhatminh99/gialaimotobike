<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('layout');
});

Route::get('/login',[UserController::class,'login']);
Route::get('/register',[UserController::class,'register']);

Route::post('/register-customer',[UserController::class,'registerCustomer']);
Route::post('/login-customer',[UserController::class,'loginCustomer']);

Route::get('/logout-customer', [UserController::class,'logoutCustomer']);
