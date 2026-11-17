
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
