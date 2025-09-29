<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishesController;

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

Route::get('/index', [ContactController::class, 'index'])->name('contact.index');
Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/{contact}/update', [ContactController::class, 'update'])->name('contact.update');
Route::delete('{contact}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/dishes', [DishesController::class, 'index'])->name('dishes.index');
    Route::get('/dishes/create', [DishesController::class, 'create'])->name('dishes.create');
    Route::post('/dishes/store', [DishesController::class, 'store'])->name('dishes.store');
    Route::get('/dishes/{dish}', [DishesController::class, 'show'])->name('dishes.show');
    Route::get('/dishes/edit/{dish}', [DishesController::class, 'edit'])->name('dishes.edit');
    Route::put('/dishes/update/{dish}', [DishesController::class, 'update'])->name('dishes.update');
    Route::delete('/dishes/{dish}', [DishesController::class, 'destroy'])->name('dishes.destroy');
});


require __DIR__.'/auth.php';
