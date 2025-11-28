<?php

namespace App\Http\Controllers;
use App\Models\Allergy;
use App\Http\Requests\AllergyRequest;
use App\Models\Ingredient;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Allergy::class);

        $allergies = Allergy::all();
        return view('allergies.index', compact('allergies'));
    }

    public function create()
    {
        $this->authorize('create', Allergy::class);

        return view('allergies.create');
    }

    public function store(AllergyRequest $request)
    {
        $this->authorize('create', Allergy::class);

        $validated = $request->validated();

        $allergy = Allergy::create([
            'name' => $validated['name'],
            'description' =>$validated['description'],
        ]);

        return redirect()->route('allergies.index')->with('success', 'Allergie succesvol aangemaakt.');
    }

    public function edit(Allergy $allergy)
    {
        $this->authorize('update', $allergy);

        return view('allergies.edit', compact('allergy'));
    }

    public function update(AllergyRequest $request, Allergy $allergy)
    {
        $this->authorize('update', $allergy);

        $validated = $request->validated();

        $allergy->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('allergies.index')->with('success', 'Allergie succesvol aangepast.');
    }

    public function destroy(Allergy $allergy)
    {
        $this->authorize('delete', $allergy);

        $allergy->delete();

        return redirect()->route('allergies.index')->with('success', 'Allergie succesvol verwijderd.');
    }
}
