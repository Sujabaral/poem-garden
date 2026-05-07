<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/poems', [PoemController::class, 'index']);


Route::get('/featured', [PoemController::class, 'featured']);
Route::get('/poems/create', [PoemController::class, 'create']);

Route::post('/poems', [PoemController::class, 'store']);
Route::get('/poems/{id}', [PoemController::class, 'show']);
Route::get('/poems/{id}/edit', [PoemController::class, 'edit']);
Route::put('/poems/{id}', [PoemController::class, 'update']);
Route::delete('/poems/{id}', [PoemController::class, 'destroy']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);  

//Authentication CRUD wala for users
Route::middleware('auth')->group(function () {
    Route::get('/account', [UserController::class, 'show']);
    Route::get('/account/edit', [UserController::class, 'edit']);
    Route::put('/account', [UserController::class, 'update']);
    Route::delete('/account', [UserController::class, 'destroy']);
});