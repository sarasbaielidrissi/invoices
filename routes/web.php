<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('/clients/search', [ClientController::class, 'search'])->name('clients.search');
Route::resource('clients', ClientController::class);

