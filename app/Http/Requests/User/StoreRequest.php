<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Das Feld muss ausgefüllt werden.',
            'name.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'name.max' => 'Das Feld darf nicht länger als 100 Zeichen sein',

            'email.required' => 'Das Feld muss ausgefüllt werden.',
            'email.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'email.max' => 'Das Feld darf nicht länger als 100 Zeichen sein',

            'password.required' => 'Das Feld muss ausgefüllt werden.',
            'password.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'password.max' => 'Das Feld darf nicht länger als 100 Zeichen sein',
        ];
    }
}
