<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function()
{

    // Table Routes
    Route::resource('table',TableController::class);
    Route::patch('table/{table}/status',[TableController::class,'updateStatus']);

    // category routes
    Route::resource('category',CategoryController::class);
    Route::patch('category/{category}/status',[CategoryController::class,'updateStatus']);
});

require __DIR__.'/auth.php';
