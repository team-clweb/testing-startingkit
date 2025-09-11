<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Company;
use App\Http\Requests\ContactRequest;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        //$contacts = Contact::all();
        //return view('contact.index', compact('contacts'));

        $contacts = Contact::with('company')->paginate(10);
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactRequest $request)
    {
        $validatedData = $request->validated();

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

    public function update(ContactRequest $request, Contact $contact)
    {
        $validatedData = $request->validated();

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
