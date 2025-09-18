<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Recipe;

class DishesController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('recipe')->get();
        return view('dishes.index', compact('dishes'));
    }

    public function show(Dish $dish)
    {
        $dish->load('recipe.ingredients');

        return view('dishes.show', compact('dish'));
    }
}
