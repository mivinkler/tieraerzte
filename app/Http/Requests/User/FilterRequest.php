<?php

namespace App\Http\Requests\User;

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
            'id' => 'nullable|intenger',
            'name' => 'nullable|string',
            'role' => 'nullable|exists:users,role',
            'praxis' => 'nullable|string',
            'praxis_id' => 'nullable|intenger',
            'locality' => 'nullable|string',
            'email' => 'string|email',
        ];
    }
}
