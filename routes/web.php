<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return to_route('expenses.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('expenses', ExpenseController::class)->only('index', 'edit');
});

require __DIR__.'/auth.php';
