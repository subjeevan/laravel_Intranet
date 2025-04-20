<?php

use App\Http\Controllers\CalanderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('guides', [DashboardController::class, 'guides'])->name('guides');
Route::get('intranet', [DashboardController::class, 'home'])->name('dashboard');
Route::get('changepwd', [DashboardController::class, 'changepwd'])->name('changepwd');
Route::get('calander', [DashboardController::class,'calander'])->name('calander');
Route::get('/apitest', [DashboardController::class, 'apitest'])->name('apitest');
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'authProviderRedirect')->name('auth.redirection');

    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('phpinfo', function () {
    return view('phpinfo');
});
Route::get('oracle', [HospitalController::class, 'index'])->name('oracle');

Route::get('/dummydata',[DummyController::class,'index'])->name('dummydata');
Route::get('dateconverter',[DummyController::class,'dateconverter'])->name('dateconverter');
Route::get('/calander',[CalanderController::class,'index'])->name('calander');
Route::get('report',[DummyController::class,'report']);

require __DIR__ . '/auth.php';
