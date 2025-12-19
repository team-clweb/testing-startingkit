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
            'firstname.max' => 'Voornaam is te lang.',

            'infix.alpha' => 'Tussenvoegsel moet tekst zijn.',
            'infix.max' => 'Tussenvoegsel is te lang.',

            'lastname.required' => 'Achternaam is verplicht.',
            'lastname.alpha' => 'Achternaam moet tekst zijn.',
            'lastname.max' => 'Achternaam is te lang',

            'email.required' => 'Email is verplicht.',
            'email.email' => 'Email moet een geldig zijn.',
            'email.max' => 'Email is te lang.',

            'message.required' => 'Bericht is verplicht.',
            'message.string' => 'Bericht moet tekst zijn.',
            'message.max' => 'Bericht is te lang.',
        ];
    }
}
