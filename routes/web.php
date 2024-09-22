<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store']);

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

// Auth- only accessible if not authenticated/guest
Route::middleware('guest')->group(function () {
    //Register
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    //Login
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

//only accessible if authenticated
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware("auth");
