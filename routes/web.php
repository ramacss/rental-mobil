
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('/login', 'auth.login')->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::view('/register', 'auth.register')->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Bengkel Maintenance
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::get('/bengkel', [\App\Http\Controllers\BengkelController::class, 'index'])
        ->name('bengkel.index');

    Route::get('/bengkel/tambah', [\App\Http\Controllers\BengkelController::class, 'create'])
        ->name('bengkel.create');

    Route::post('/bengkel', [\App\Http\Controllers\BengkelController::class, 'store'])
        ->name('bengkel.store');

    Route::get('/bengkel/{id}/edit', [\App\Http\Controllers\BengkelController::class, 'edit'])
        ->name('bengkel.edit');

    Route::put('/bengkel/{id}', [\App\Http\Controllers\BengkelController::class, 'update'])
        ->name('bengkel.update');

    Route::delete('/bengkel/{id}', [\App\Http\Controllers\BengkelController::class, 'destroy'])
        ->name('bengkel.destroy');
});

// Admin dan Staff
Route::middleware(['auth', 'role:admin,staff'])->group(function () {

    Route::resource('armada', ArmadaController::class)
        ->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.editProfile');

    Route::put('/profile', [ProfileController::class, 'updateProfile'])
        ->name('profile.update');

    Route::get('/profile/change-password', [ProfileController::class, 'editPassword'])
        ->name('profile.password.edit');

    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');
});

// Khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});
