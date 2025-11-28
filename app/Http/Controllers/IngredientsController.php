<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Stock;
use App\Models\Allergy;
use App\Http\Requests\IngredientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IngredientsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Ingredient::class);

        $ingredients = Ingredient::with('stock')->paginate(10);

        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        $this->authorize('create', Ingredient::class);
        return view('ingredients.create');
    }

    public function store(IngredientRequest $request)
    {
        $this->authorize('create', Ingredient::class);
        $validated = $request->validated();

        $ingredient = Ingredient::create([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
        ]);

        Stock::create([
            'ingredient_id' => $ingredient->id,
            'quantity' => $validated['quantity'],
            'delivery_date' => now(),
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt aangemaakt.');
    }

     public function show(Ingredient $ingredient)
     {
         $this->authorize('view', $ingredient);

         $ingredient->load('allergies');

         return view('ingredients.show', compact('ingredient'));
     }

    public function edit(Ingredient $ingredient)
    {

        $this->authorize('update', $ingredient);
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $this->authorize('update', $ingredient);

        $validated = $request->validated();

        $ingredient->update([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
        ]);

        $ingredient->stock->update([
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt bijgewerkt.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $this->authorize('delete', $ingredient);

        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingrediënt verwijderd.');
    }
}
