<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('/clients/search', [ClientController::class, 'search'])->name('clients.search');
Route::resource('clients', ClientController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
