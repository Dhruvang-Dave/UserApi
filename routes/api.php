<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/sessions' , [SessionsController::class , 'store']);

// Route::get('/delete/{id}', [UserController::class , 'delete'])->middleware('admin');

// Route::get('/update/{id}', [UserController::class , 'update']);

// Route::get('/all', [UserController::class , 'all'])->middleware('admin');

// Route::get('/register', [RegisterController::class , 'create']);

// Route::get('/register', [RegisterController::class , 'store']); //->middleware('guest')

// Route::get('/logout' , [SessionsController::class , 'destroy'])->middleware('auth');

// Route::get('/login' , [SessionsController::class , 'create'])->middleware('guest');

// Route::get('/own-info/{id}' , [UserController::class , 'info']);