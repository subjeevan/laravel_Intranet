<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('guides', [DashboardController::class, 'guides'])->name('guides');
Route::get('intranet', [DashboardController::class,'home'])->name('dashboard');
Route::get('changepwd',[DashboardController::class,'changepwd'])->name('changepwd');
