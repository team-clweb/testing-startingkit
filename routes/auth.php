<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\AllergyController;
use App\Http\Controllers\OpeningHourController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/ingredients', [IngredientsController::class, 'index'])->name('ingredients.index');
    Route::get('/ingredients/create', [IngredientsController::class, 'create'])->name('ingredients.create');
    Route::post('/ingredients/store', [IngredientsController::class, 'store'])->name('ingredients.store');
    Route::get('/ingredients/{ingredient}', [IngredientsController::class, 'show'])->name('ingredients.show');
    Route::get('/ingredients/edit/{ingredient}', [IngredientsController::class, 'edit'])->name('ingredients.edit');
    Route::put('/ingredients/update/{ingredient}', [IngredientsController::class, 'update'])->name('ingredients.update');
    Route::delete('/ingredients/{ingredient}', [IngredientsController::class, 'destroy'])->name('ingredients.destroy');

    Route::get('/dishes/create', [DishesController::class, 'create'])->name('dishes.create');
    Route::post('/dishes/store', [DishesController::class, 'store'])->name('dishes.store');
    Route::get('/dishes/{dish}', [DishesController::class, 'show'])->name('dishes.show');
    Route::get('/dishes/edit/{dish}', [DishesController::class, 'edit'])->name('dishes.edit');
    Route::put('/dishes/update/{dish}', [DishesController::class, 'update'])->name('dishes.update');
    Route::delete('/dishes/{dish}', [DishesController::class, 'destroy'])->name('dishes.destroy');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/edit/{reservation}', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/update/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/opening-hours', [OpeningHourController::class, 'index'])->name('opening-hours.index');
    Route::get('/opening-hours/edit/{hour}', [OpeningHourController::class, 'edit'])->name('opening-hours.edit');
    Route::put('/opening-hours/update/{hour}', [OpeningHourController::class, 'update'])->name('opening-hours.update');

    Route::get('/allergies', [AllergyController::class, 'index'])->name('allergies.index');
    Route::get('/allergies/create', [AllergyController::class, 'create'])->name('allergies.create');
    Route::post('/allergies', [AllergyController::class, 'store'])->name('allergies.store');
    Route::get('/allergies/edit/{allergy}', [AllergyController::class, 'edit'])->name('allergies.edit');
    Route::put('/allergies/update/{allergy}', [AllergyController::class, 'update'])->name('allergies.update');
    Route::delete('/allergies/{allergy}', [AllergyController::class, 'destroy'])->name('allergies.destroy');

});
