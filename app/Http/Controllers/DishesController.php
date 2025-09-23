<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Http\Requests\DishRequest;

class DishesController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('recipe')->get();
        return view('dishes.index', compact('dishes'));
    }

    public function create(Dish $dish)
    {
        return view('dishes.create', compact('dish'));
    }

    public function store(DishRequest $request)
    {
        $validated = $request->validated();

        $dish = Dish::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        Recipe::create([
            'dish_id' => $dish->id,
            'instructions' => $validated['instructions'],
        ]);

        return redirect()->route('dishes.index')->with('success', 'Gerecht aangemaakt.');
    }



    public function show(Dish $dish)
    {
        $dish->load('recipe.ingredients.stocks');

        return view('dishes.show', compact('dish'));
    }

    public function edit(Dish $dish)
    {
        $dish->load('recipe');
        return view('dishes.edit', compact('dish'));
    }

    public function update(DishRequest $request, Dish $dish)
    {
        $validated = $request->validated();

        $dish->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        $dish->recipe->update([
            'instructions' => $validated['instructions'],
        ]);

        return redirect()->route('dishes.index')->with('success', 'Gerecht bijgewerkt.');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();

        //return redirect('/dishes')->with('success', 'Gerecht verwijderd.');
        //return redirect()->route('dishes.index')->with('success', 'Gerecht verwijderd.');
    }
}
