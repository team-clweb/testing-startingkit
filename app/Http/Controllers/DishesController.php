<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Http\Requests\DishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use App\Http\Controllers\Auth\AuthController;


class DishesController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('recipe')->get();
        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        $this->authorize('create', Dish::class);

        return view('dishes.create');
    }

    public function store(DishRequest $request)
    {
        $this->authorize('create', Dish::class);

        $validated = $request->validated();

        $dish = Dish::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);
        $dish->recepies()->create( [ 'instructions' => $validated['instructions']]);

//        Recipe::create([
//            'dish_id' => $dish->id,
//            'instructions' => $validated['instructions'],
//        ]);

        return redirect()->route('dishes.index')->with('success', 'Gerecht aangemaakt.');
    }

    public function show(Dish $dish)
    {
        $this->authorize('view', $dish);

        $dish->load('recipe.ingredients.stocks');

        return view('dishes.show', compact('dish'));
    }

    public function edit(Dish $dish)
    {
        $this->authorize('update', $dish);

        $dish->load('recipe','recipe.ingredients');

        $view = view('dishes.edit');
        $view->dish = $dish;
        $view->ingrediens = Ingredient::all()->pluck('name', 'id')->all();

        return $view;
    }

    public function update(DishRequest $request, Dish $dish)
    {

        $this->authorize('update', $dish);

        $validated = $request->validated();

        $dish->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);
        $new_collection = collect($request->get('recipe_ingredients'));
        $new = $new_collection->filter(function ($value, $key) {

            return isset($value['quantity']);
        })->toArray();

       // dd($new);
//dd($request->all());
        $dish->recipe->ingredients()->sync($new);
        ////$user->roles()->sync([1 => ['expires' => true], 2, 3]);
        $dish->recipe->update([
            'instructions' => $validated['instructions'],
        ]);

        return redirect()->route('dishes.index')->with('success', 'Gerecht bijgewerkt.');
    }

    public function destroy(Dish $dish)
    {
        $this->authorize('delete', $dish);

        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Gerecht verwijderd.');
    }
}
