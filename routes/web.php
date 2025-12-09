<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/support', [SupportController::class, 'index'])->name('support');
Route::post('/support/store', [SupportController::class, 'store'])->name('support.store');

require __DIR__.'/auth.php';
