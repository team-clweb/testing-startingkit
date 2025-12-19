<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|alpha|max:80',
            'phone' => 'required|string|regex:/^[ 0-9+\s()-]+$/|max:12',
            'email' => 'required|email:rfc,dns',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string',
            'persons' => 'required|integer|min:1|max:12',
            'message' => 'nullable|string|max:300',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Naam is verplicht.',
            'name.alpha' => 'Naam moet tekst zijn.',
            'name.max' => 'Naam is ongeldig.',

            'phone.required' => 'Telefoonnummer is verplicht.',
            'phone.string' => 'Telefoonnummer moet tekst zijn.',
            'phone.regex' => 'Telefoonnummer is niet geldig.',
            'phone.max' => 'Telefoonnummer is ongeldig.',

            'email.required' => 'Het e-mailadres is verplicht.',
            'email.email' => 'Het e-mailadres moet geldig zijn.',

            'date.required' => 'Datum is verplicht.',
            'date.after_or_equal' => 'Deze datum is niet mogelijk',

            'time.required' => 'Tijd is verplicht.',
            'time.string' => 'Tijd moet een getal zijn.',

            'persons.required' => 'Aantal personen is verplicht.',
            'persons.integer' => 'Aantal personen moet een getal zijn.',
            'persons.min' => 'Er moet minimaal 1 persoon zijn.',
            'persons.max' => 'Het maximale personen is 12.',

            'message.max' => 'Uw bericht is te lang.',
        ];
    }
}
