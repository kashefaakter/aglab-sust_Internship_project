<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublicPublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});


// ===============================
// PUBLIC OUTPUTS
// ===============================

Route::get('/outputs', [PublicPublicationController::class, 'index'])
    ->name('public.outputs');

Route::get('/outputs/publication/{publication}', [PublicPublicationController::class, 'show'])
    ->name('public.publication.show');


// ===============================
// DASHBOARD
// ===============================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ===============================
// ADMIN PANEL
// ===============================

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('publications', PublicationController::class);
});


// ===============================
// PROFILE
// ===============================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});



require __DIR__.'/auth.php';