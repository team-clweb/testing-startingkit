<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DishesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [ContactController::class, 'index'])->name('contact.index');
Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/{contact}/update', [ContactController::class, 'update'])->name('contact.update');
Route::delete('{contact}/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::get('/dishes', [DishesController::class, 'index'])->name('dishes.index');
