<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');

// Route to delete a user
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route to show create user form
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');

// Route to store a newly created user
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');

require __DIR__.'/auth.php';
