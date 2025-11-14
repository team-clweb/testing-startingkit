<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $validated = $request->validated();

        //zorgt ervoor dat er maximaal 20 mensen op 1 datum + tijd kunnen staan
        $existingPersons = Reservation::where('date', $validated['date'])
            ->where('time', $validated['time'])
            ->sum('persons');

        if ($existingPersons + $validated['persons'] > 20) {
            return back()->withInput()->with('error', 'Excuses, geen plek meer op dit tijdstip.');
        }

        $reservation = Reservation::create([
            'name' => $validated['name'],
            'phone' =>$validated['phone'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'persons' => $validated['persons'],
            'message' => $validated['message'] ?? null,
        ]);

        return back()->with('success', 'Je reservering is succesvol verzonden!');
    }
}
