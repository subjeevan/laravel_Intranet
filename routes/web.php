<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('homepage', [DashboardController::class, 'home'])->name('homepage');
