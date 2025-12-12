<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Allergy;

class MenuController extends Controller
{
    //

    public function index()
    {
        $allergies = Allergy::all();
        $dishes = Dish::with('recipe.ingredients.allergies')->get();
        return view('menu.index', compact('allergies', 'dishes'));
    }
}
