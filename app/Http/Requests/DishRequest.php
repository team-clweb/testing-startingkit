<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:80',
            'description' => 'nullable|max:150',
            'instructions' => 'required|max:150',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'De naam van het gerecht is verplicht.',
            'name.max' => 'De naam van het gerecht mag niet langer zijn dan 80 tekens.',

            'description.max' => 'De beschrijving mag niet langer zijn dan 150 tekens.',

            'instructions.required' => 'Het recept is verplicht.',
            'instructions.max' => 'Het recept mag niet langer zijn dan 150 tekens.',

            'price.required' => 'Prijs is verplicht.',
            'price.numeric' => 'Prijs moet een getal zijn.',
            'price.min' => 'Prijs is onjuist',


            'image.image' => 'Het bestand moet een afbeelding zijn.',
            'image.max' => 'De afbeelding is te groot.',
        ];
    }
}
