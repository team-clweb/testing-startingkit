<?php

namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;
use App\Http\Requests\OpeningHourRequest;

class OpeningHourController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', OpeningHour::class);

        $openingHours = OpeningHour::all();

        return view('opening-hours.index', compact('openingHours'));
    }

    public function edit(OpeningHour $hour)
    {
        $this->authorize('update', $hour);

        return view('opening-hours.edit', compact('hour'));
    }

    public function update(OpeningHourRequest $request, OpeningHour $hour)
    {
        //dd($request->all());

        $this->authorize('update', $hour);

        $validated = $request->validated();

        $hour->update([
            'open' => $validated['open'],
            'close' => $validated['close'],
            'closed' => $validated['closed'] ?? false,
        ]);

        return redirect()->route('opening-hours.index')->with('success', 'Openingstijd bijgewerkt.');
    }
}
