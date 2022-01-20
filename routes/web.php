<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Location', [LocationController::class, 'index'])->name('Location');
Route::get('Location/show', [LocationController::class, 'show'])->name('Location.show');
Route::get('city/fetch', [LocationController::class, 'city'])->name('city.fetch');
Route::get('area/fetch', [LocationController::class, 'area'])->name('area.fetch');
Route::post('add/location', [LocationController::class, 'store'])->name('add.location');