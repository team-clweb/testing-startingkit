<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Http\Requests\SupportRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SupportNotification;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function store(SupportRequest $request)
    {
        $validated = $request->validated();

        $support = Support::create($validated);

        Notification::route('mail', 'dennis@restaurant.com')
            ->notify(new SupportNotification($support));

        return redirect()->route('support')->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.');
    }
}
