<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Http\Requests\IngredientRequest;

class IngredientsController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(IngredientRequest $request)
    {
        $validated = $request->validated();

        Ingredient::create([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt aangemaakt.');
    }


    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $validated = $request->validated();

        $ingredient->update([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt bijgewerkt.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt verwijderd.');
    }
}
