<?php

namespace App\Http\Requests\Main;
use Illuminate\Validation\Validator;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'earliest' => 'nullable',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'tageszeit' => 'nullable',
            'tiername' => 'required|string|max:20',
            'tierart' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'tel' => 'nullable|string|max:20',
            'text' => 'nullable|string|max:500',
        ];
    }
    public function messages()
    {
        return [
            'earliest.boolean' => 'Ungültiger Wert für Checkbox.',
            'time.date_format' => 'Ungültiges Zeitformat.',

            'tiername.required' => 'Pflichtfeld.',
            'tiername.string' => 'Nur Textzeichen.',
            'tiername.max' => 'Maximal 20 Zeichen.',

            'tierart.string' => 'Nur Textzeichen.',
            'tierart.max' => 'Maximal 30 Zeichen.',

            'email.max' => 'Maximal 100 Zeichen.',
            'email.email' => 'Muss eine gültige E-Mail-Adresse sein.',

            'tel.string' => 'Nur Textzeichen.',
            'tel.max' => 'Maximal 20 Zeichen.',

            'text.string' => 'Nur Textzeichen.',
            'text.max' => 'Maximal 500 Zeichen.',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $earliest = $this->input('earliest');
            $date = $this->input('date');
            $email = $this->input('email');
            $telefon = $this->input('tel');

            if (empty($earliest) && empty($date)) {
                $validator->errors()->add('termin', 'Bitte wählen: "Baldmöglichster Termin" oder "Datum"');
            }

            if (empty($email) && empty($telefon)) {
                $validator->errors()->add('email', 'Bitte füllen Sie das Feld "Email" oder "Telefon" aus');
            }
        });
    }
}
