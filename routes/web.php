<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('points', PointsController::class);
Route::resource('polylines', PolylinesController::class);
Route::resource('polygons', PolygonsController::class);

Route::get('/map', [PointsController::class, 'index'])->middleware(['auth', 'verified'])->name('map');
Route::get('/table', [TableController::class, 'index'])->middleware(['auth', 'verified'])->name('table');

Route::get('/data', function () {
    return view('contact', ['title' => 'Kontak & Informasi']);
})->name('data');

require __DIR__.'/auth.php';
