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

            'image' => 'nullable|mimes:jpg,jpeg,png',
            'text_aboutus' => 'nullable|string|max:350',

            'title_one' => 'nullable|string|max:100',
            'text_one' => 'nullable|string|max:1200',
            'title_two' => 'nullable|string|max:100',
            'text_two' => 'nullable|string|max:1200',
            'title_three' => 'nullable|string|max:100',
            'text_three' => 'nullable|string|max:1200',
            'text_sitebar' => 'nullable|string|max:255',

            'monday_start1' => 'nullable',
            'monday_end1' => 'nullable',
            'monday_start2' => 'nullable',
            'monday_end2' => 'nullable',
            'tuesday_start1' => 'nullable',
            'tuesday_end1' => 'nullable',
            'tuesday_start2' => 'nullable',
            'tuesday_end2' => 'nullable',
            'wednesday_start1' => 'nullable',
            'wednesday_end1' => 'nullable',
            'wednesday_start2' => 'nullable',
            'wednesday_end2' => 'nullable',
            'thursday_start1' => 'nullable',
            'thursday_end1' => 'nullable',
            'thursday_start2' => 'nullable',
            'thursday_end2' => 'nullable',
            'friday_start1' => 'nullable',
            'friday_end1' => 'nullable',
            'friday_start2' => 'nullable',
            'friday_end2' => 'nullable',
            'saturday_start1' => 'nullable',
            'saturday_end1' => 'nullable',
            'saturday_start2' => 'nullable',
            'saturday_end2' => 'nullable',
            'sunday_start1' => 'nullable',
            'sunday_end1' => 'nullable',
            'sunday_start2' => 'nullable',
            'sunday_end2' => 'nullable',

            'postscript' => 'nullable|string|max:150',
            'days_interval' => 'nullable',

            'therapy' => 'array',
            'therapy.*' => 'exists:therapies_lists,id',
            'therapy_text' => 'array',
            'therapy_text.*' => 'nullable|string|max:300',

            'therapy_other_title' => 'array',
            'therapy_other_title.*' => 'nullable|string|max:50',
            'therapy_other_text' => 'array',
            'therapy_other_text.*' => 'nullable|string|max:300',
            'therapy_other_id' => 'array',
            'therapy_other_id.*' => 'nullable|numeric',

            'nursing' => 'array',
            'nursing.*' => 'exists:nursings_lists,id',
            'nursing_text' => 'array',
            'nursing_text.*' => 'nullable|string|max:300',

            'nursing_other_title' => 'array',
            'nursing_other_title.*' => 'nullable|string|max:50',
            'nursing_other_text' => 'array',
            'nursing_other_text.*' => 'nullable|string|max:300',
            'nursing_other_id' => 'array',
            'nursing_other_id.*' => 'nullable|numeric',

            'service' => 'array',
            'service.*' => 'exists:services_lists,id',

            'device' => 'array',
            'device.*' => 'exists:devices_lists,id',

            'animal' => 'array',
            'animal.*' => 'exists:animals_lists,id',

            'language' => 'array',
            'language.*' => 'exists:languages_lists,id',
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

            'image.mimes' => 'Das Feld muss ein Bild im Format jpg, jpeg oder png sein.',

            'text_aboutus.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'text_aboutus.max' => 'Das Feld darf nicht länger als 350 Zeichen sein.',
                   
            'monday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'monday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',

            'tuesday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'tuesday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'wednesday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'wednesday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'thursday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'thursday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'friday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'friday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'saturday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'saturday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'sunday.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'sunday.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            
            'postscript.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'postscript.max' => 'Das Feld darf nicht länger als 150 Zeichen sein.',
              
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
     
            'therapy_text.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'therapy_text.max' => 'Das Feld darf nicht länger als 300 Zeichen sein.',

            'other_title.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'other_title.max' => 'Das Feld darf nicht länger als 50 Zeichen sein.',
            'other_text.string' => 'Das Feld muss eine Zeichenfolge sein.',
            'other_text.max' => 'Das Feld darf nicht länger als 300 Zeichen sein.',
        ];
    }
}
