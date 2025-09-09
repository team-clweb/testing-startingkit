<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Company;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        //$contacts = Contact::all();
        //return view('contact.index', compact('contacts'));

        $contacts = Contact::with('company')->get();
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60|regex:/^[a-zA-Z ]+$/',
            'organization' => 'required|max:70|regex:/^[a-zA-Z ]+$/',
            'city' => 'required|max:70|regex:/^[a-zA-Z ]+$/',
        ]);

        $company = Company::create([
            'organization' => $validatedData['organization'],
            'city' => $validatedData['city'],
        ]);

        Contact::create([
            'name' => $validatedData['name'],
            'company_id' => $company->id,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact aangemaakt.');
    }


    public function edit(Contact $contact)
    {
        $contact->load('company');
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60|regex:/^[a-zA-Z ]+$/',
            'organization' => 'required|max:70|regex:/^[a-zA-Z ]+$/',
            'city' => 'required|max:70|regex:/^[a-zA-Z ]+$/',
        ]);

        $contact->update([
            'name' => $validatedData['name'],
        ]);

        $contact->company->update([
            'organization' => $validatedData['organization'],
            'city' => $validatedData['city'],
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact bijgewerkt.');
    }


    public function destroy(Contact $contact)
    {
        //$contact->company?->delete();
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact verwijderd.');
    }
}
