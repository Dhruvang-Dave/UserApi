<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/postman/csrf', function (Request $request) {
	return csrf_token();
});

Route::get('/delete/{id}', [UserController::class , 'delete'])->middleware('admin');

Route::get('/update/{id}', [UserController::class , 'update']);

Route::get('/sessions' , [SessionsController::class , 'store']);

Route::get('/all', [UserController::class , 'all'])->middleware('admin');

// Route::get('/register', [RegisterController::class , 'create']);

Route::get('/register', [RegisterController::class , 'store']); //->middleware('guest')

Route::get('/logout' , [SessionsController::class , 'destroy'])->middleware('auth');

Route::get('/login' , [SessionsController::class , 'create'])->middleware('guest');

Route::get('/own-info/{id}' , [UserController::class , 'info']);
