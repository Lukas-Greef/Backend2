<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/registreer', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/registreer', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [GameController::class, 'dashboard'])->name('dashboard');
    Route::post('/games/create', [GameController::class, 'createGame'])->name('games.create');
    Route::get('/games/{game}/join', [GameController::class, 'joinGame'])->name('games.join');
    Route::get('/games/{game}/play', [GameController::class, 'play'])->name('games.play');
    Route::post('/games/{game}/choice', [GameController::class, 'submitChoice'])->name('games.choice');
});
