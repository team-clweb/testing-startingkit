<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReservationNotification;
use App\Notifications\ReservationEditNotification;
use App\Notifications\ReservationDeleteNotification;
class ReservationController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Reservation::class);

        $reservations = DB::table('reservations')->orderBy('date', 'asc')->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function edit(Reservation $reservation)
    {
        $this->authorize('update', $reservation);

        return view('reservations.edit', compact('reservation'));
    }

    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $this->authorize('update', $reservation);

        $validated = $request->validated();

        //zorgt ervoor dat er maximaal 20 mensen op 1 datum + tijd kunnen staan
        $existingPersons = Reservation::where('date', $validated['date'])
            ->where('time', $validated['time'])
            ->where('id', '!=', $reservation->id) // anders telt die huidige reservering ook mee
            ->sum('persons');

        if ($existingPersons + $validated['persons'] > 20) {
            return back()->withInput()->with('error', 'Excuses, geen plek meer op dit tijdstip.');
        }

        $reservation->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'persons' => $validated['persons'],
            'message' => $validated['message'],
        ]);

        Notification::route('mail', 'dennis@restaurant.com')
            ->notify(new ReservationEditNotification($reservation));

        return redirect()->route('reservations.index')->with('success', 'Reservering bijgewerkt.');
    }
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

        Notification::route('mail', 'dennis@restaurant.com')
            ->notify(new ReservationNotification($reservation));

        return back()->with('success', 'Je reservering is succesvol verzonden!');
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);

        $reservation->delete();

        Notification::route('mail', 'dennis@restaurant.com')
            ->notify(new ReservationDeleteNotification($reservation));

        return redirect()->route('reservations.index')->with('success', 'Reservering is succesvol geannuleerd.');
    }
}
