<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// ✅ Smart root route (IMPORTANT)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // logged in
    } else {
        return redirect()->route('login'); // not logged in
    }
});

// ✅ Dashboard (protected)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// optional
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ✅ Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resource('vehicle-types', VehicleTypeController::class);
    Route::resource('vehicles', VehicleController::class);
});
