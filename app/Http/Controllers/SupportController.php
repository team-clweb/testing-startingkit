<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use App\Http\Requests\SupportRequest;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function store(SupportRequest $request)
    {
        $validated = $request->validated();

        Support::create($validated);

        return redirect()->route('support')->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.');
    }
}
