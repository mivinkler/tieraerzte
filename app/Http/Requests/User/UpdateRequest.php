<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string',
            'street' => 'string',
            'postcode' => 'string',
            'locality' => 'string',
            'tel' => 'nullable|string',
            'email' => 'string',
            'text_aboutus' => 'nullable|string',
            'text_one' => 'nullable|string',
            'image' => 'nullable|image',
            'therapy' => 'nullable|Array',
            'therapy_text' => 'nullable|Array',
            'other_one' => 'nullable|string',
            'other_text_one' => 'nullable|string',
            'other_two' => 'nullable|string',
            'other_text_two' => 'nullable|string',
        ];
    }
}
