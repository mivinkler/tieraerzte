<?php

namespace App\Http\Requests\Praxis;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric',
            'title' => 'string|nullable|max:100',
            'street' => 'string|nullable|max:100',
            'postcode' => 'string|nullable|max:10',
            'radius' => 'numeric|nullable|max:10',
            'locality' => 'string|nullable|max:100',
            'user' => 'string|nullable|max:100',
            'email' => 'string|email|nullable|max:100',
            'therapy_id' => 'nullable',
        ];
    }
}
