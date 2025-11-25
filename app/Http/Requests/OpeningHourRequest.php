<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpeningHourRequest extends FormRequest
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
            'open' => 'nullable|date_format:H:i,H:i:s',
            'close' => 'nullable|date_format:H:i,H:i:s|after:open',
            'closed' => 'boolean',
        ];
    }
    public function messages()
    {
        return [
            'open.date_format' => 'Openingstijd is ongeldig.',
            'close.date_format' => 'Sluitingstijd is ongeldig.',
            'close.after' => 'Sluitingstijd moet na openingstijd.'
        ];
    }
}
