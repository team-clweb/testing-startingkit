<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
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
            'name' => 'required|string|max:80',
            'unit' => 'required|string|max:30',
            'quantity' => 'required|numeric|min:0',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'De naam van het ingrediënt is verplicht.',
            'name.string' => 'De naam van het ingrediënt moet tekst zijn.',
            'name.max' => 'De naam van het ingrediënt is te lang.',

            'unit.required' => 'Eenheid is verplicht.',
            'unit.string' => 'Eenheid moet tekst zijn.',
            'unit.max' => 'Eenheid is te lang.',

            'quantity.required' => 'Opslag is verplicht.',
            'quantity.numeric' => 'Opslag moet een getal zijn.',
            'quantity.min' => 'Opslag mag niet negatief zijn.',
        ];
    }
}
