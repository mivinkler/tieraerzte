<?php

namespace App\Http\Requests\Praxis;

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
            'title' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'house' => 'required|string|max:20',
            'postcode' => 'required|string|max:10',
            'locality' => 'required|string|max:100',
            'tel' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:100',

            'text_aboutus' => 'nullable|string|max:350',
            'title_one' => 'nullable|string|max:100',
            'text_one' => 'nullable|string|max:1200',
            'title_two' => 'nullable|string|max:100',
            'text_two' => 'nullable|string|max:1200',
            'title_three' => 'nullable|string|max:100',
            'text_three' => 'nullable|string|max:1200',
            'text_sitebar' => 'nullable|string|max:255',

            'image' => 'nullable|mimes:jpg,jpeg,png',

            'therapy' => 'array',
            'therapy.*' => 'exists:therapies,id',
            'therapy_text' => 'array',
            'therapy_text.*' => 'nullable|string|max:300',

            'other_title' => 'array',
            'other_title.*' => 'nullable|string|max:50',
            'other_text' => 'array',
            'other_text.*' => 'nullable|string|max:300',
            'other_id' => 'array',
            'other_id.*' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Das Feld muss ausgefüllt werden.',
            'title.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'title.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',

            'street.required' => 'Das Feld muss ausgefüllt werden.',
            'street.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'street.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',

            'house.required' => 'Das Feld muss ausgefüllt werden.',
            'house.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'house.max' => 'Das Feld darf nicht länger als 20 Zeichen sein.',
                        
            'postcode.required' => 'Das Feld muss ausgefüllt werden.',
            'postcode.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'postcode.max' => 'Das Feld darf nicht länger als 10 Zeichen sein.',
                        
            'locality.required' => 'Das Feld muss ausgefüllt werden.',
            'locality.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'locality.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',
                        
            'tel.required' => 'Das Feld muss ausgefüllt werden.',
            'tel.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'tel.max' => 'Das Feld darf nicht länger als 20 Zeichen sein.',

            'website.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'website.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',
                        
            'text_aboutus.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_aboutus.max' => 'Das Feld darf nicht länger als 350 Zeichen sein.',
              
            'title_one.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'title_one.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',
            'text_one.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_one.max' => 'Das Feld darf nicht länger als 1200 Zeichen sein.',

            'title_two.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'title_two.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',
            'text_two.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_two.max' => 'Das Feld darf nicht länger als 1200 Zeichen sein.',

            'title_three.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'title_three.max' => 'Das Feld darf nicht länger als 100 Zeichen sein.',
            'text_three.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_three.max' => 'Das Feld darf nicht länger als 1200 Zeichen sein.',

            'text_sitebar.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_sitebar.max' => 'Das Feld darf nicht länger als 300 Zeichen sein.',
                        
            'image.mimes' => 'Das Feld muss ein Bild im Format jpg, jpeg oder png sein.',
                        
            'therapy_text.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'therapy_text.max' => 'Das Feld darf nicht länger als 300 Zeichen sein.',

            'other_title.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'other_title.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            'other_text.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'other_text.max' => 'Das Feld darf nicht länger als 300 Zeichen sein.',
        ];
    }
}
