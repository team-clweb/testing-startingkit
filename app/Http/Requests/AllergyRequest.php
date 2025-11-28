<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllergyRequest extends FormRequest
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
            'name' => 'required|max:80',
            'description' => 'nullable|max:250',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'De naam van het allergeen is verplicht.',
            'name.max' => 'De naam van het allergeen mag niet langer zijn dan 80 tekens.',

            'description.max' => 'De beschrijving mag niet langer zijn dan 250 tekens.'
        ];
    }
}
