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
            'name' => 'required|string|max:80',
            'phone' => 'required|string|regex:/^[ 0-9+\s()-]+$/|max:12',
            'email' => 'required|email:rfc,dns',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'persons' => 'required|integer|min:1|max:12',
            'message' => 'nullable|string|max:300',
        ];
    }
}
