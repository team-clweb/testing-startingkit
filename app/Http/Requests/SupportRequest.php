<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
            'firstname' => 'required|alpha|max:80',
            'infix' => 'nullable|alpha|max:10',
            'lastname' => 'required|alpha|max:80',
            'email' => 'required|email|max:70',
            'message' => 'required|string|max:2000',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => 'Voornaam is verplicht.',
            'firstname.alpha' => 'Voornaam moet tekst zijn.',
            'firstname.max' => 'Voornaam mag niet langer zijn dan 80 tekens.',

            'infix.alpha' => 'Tussenvoegsel moet tekst zijn.',
            'infix.max' => 'Tussenvoegsel mag niet langer zijn dan 10 tekens.',

            'lastname.required' => 'Achternaam is verplicht.',
            'lastname.alpha' => 'Achternaam moet tekst zijn.',
            'lastname.max' => 'Achternaam mag niet langer zijn dan 80 tekens.',

            'email.required' => 'Email is verplicht.',
            'email.email' => 'Email moet een geldig zijn.',
            'email.max' => 'Email mag niet langer zijn dan 70 tekens.',

            'message.required' => 'Bericht is verplicht.',
            'message.string' => 'Bericht moet tekst zijn.',
            'message.max' => 'Bericht mag niet langer zijn dan 2000 tekens.',
        ];
    }
}
