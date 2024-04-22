<?php

namespace App\Http\Requests\Main;

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
            'title' => 'string|nullable',
            'street' => 'string|nullable',
            'postcode' => 'string|nullable',
            'radius' => 'numeric|nullable',
            'locality' => 'string|nullable',
            'email' => 'string|nullable',
            'therapy_id' => 'nullable',
        ];
    }
}
