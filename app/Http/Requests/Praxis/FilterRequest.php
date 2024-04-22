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
            'title' => 'string|nullable',
            'street' => 'string|nullable',
            'postcode' => 'string|nullable',
            'radius' => 'nullable',
            'locality' => 'string|nullable',
            'user' => 'string|nullable',
            'email' => 'string|nullable',
            'therapy_id' => 'nullable',
        ];
    }
}
