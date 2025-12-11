<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class MenuController extends Controller
{
    //

    public function index()
    {
        $dishes = Dish::with('recipe.ingredients.allergies')->get();
        return view('menu.index', compact('dishes'));
    }

}
