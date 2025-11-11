<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $data = $request->validated();

        Reservation::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'date' => $data['date'],
            'time' => $data['time'],
            'persons' => $data['persons'],
            'message' => $data['message'] ?? null,
        ]);

        return back()->with('success', 'Je reservering is succesvol verzonden!');
    }
}
