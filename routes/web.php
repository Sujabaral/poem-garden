<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\FavoriteController;
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});
Route :: middleware('auth')-> group(function () {

Route::get('/poems', [PoemController::class, 'index']);
Route::get('/featured', [PoemController::class, 'featured']);
Route::get('/poems/create', [PoemController::class, 'create']);
});

Route :: middleware('auth')-> group (function(){

    Route::post('/poems', [PoemController::class, 'store']);
    Route :: get('poems/trash', [PoemController::class, 'trash'])->name('poems.trash');
    Route::delete('/poems/{id}/image', [PoemController::class, 'deleteImage'])
    ->name('poems.image.delete')
    ->whereNumber('id');
    Route :: post('poems/{id}/restore', [PoemController::class, 'restore'])->name('poems.restore');
    Route :: delete('poems/{id}/force-delete', [PoemController::class, 'forceDelete'])->name('poems.force-delete');
    Route::get('/poems/{id}', [PoemController::class, 'show']);
    Route::get('/poems/{id}/edit', [PoemController::class, 'edit']);
    Route::put('/poems/{id}', [PoemController::class, 'update']);
    Route::delete('/poems/{id}', [PoemController::class, 'destroy']);});
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/poems/{id}/favorite', [FavoriteController::class, 'toggle']);

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//Authentication CRUD wala for users
Route::middleware('auth')->group(function () {
    Route::get('/account', [UserController::class, 'show']);
    Route::get('/account/edit', [UserController::class, 'edit']);
    Route::put('/account', [UserController::class, 'update']);
    Route::delete('/account', [UserController::class, 'destroy']);
});
