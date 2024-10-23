<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;

use App\Models\Clinic;
use App\Models\TherapyList;
use App\Models\NursingList;
use App\Models\ServiceList;
use App\Models\AnimalList;
use App\Models\DeviceList;
use App\Models\LanguageList;


class EditController extends Controller 
{
    public function __invoke(Clinic $praxis) {
        $therapyList = TherapyList::all();

        $therapyClinics = $praxis->therapyClinics->pluck('therapy_text', 'therapy_id')->toArray();

        $therapyOthers = $praxis->therapyOthers->map(function($other) {
            return [
                'therapy_other_title' => $other->therapy_other_title,
                'therapy_other_text' => $other->therapy_other_text,
                'isChecked' => !empty($other->therapy_other_title) || !empty($other->therapy_other_text)
            ];
        })->toArray();

        $nursingList = NursingList::all();

        $nursingClinics = $praxis->nursingClinics->pluck('nursing_text', 'nursing_id')->toArray();
        $nursingOthers = $praxis->nursingOthers->map(function($other) {
            return [
                'nursing_other_title' => $other->nursing_other_title,
                'nursing_other_text' => $other->nursing_other_text,
                'isChecked' => !empty($other->nursing_other_title) || !empty($other->nursing_other_text)
            ];
        })->toArray();
        $serviceList = ServiceList::all();
        $serviceClinics = $praxis->serviceClinics->pluck('service_id')->toArray();

        $deviceList = DeviceList::all();
        $deviceClinics = $praxis->deviceClinics->pluck('device_id')->toArray();
        
        $animalList = AnimalList::all();
        $animalClinics = $praxis->animalClinics->pluck('animal_id')->toArray();

        $languageList = LanguageList::all();
        $languageClinics = $praxis->languageClinics->pluck('language_id')->toArray();
        
        return view('user.praxis_form', compact('praxis', 'therapyList', 'therapyClinics', 'therapyOthers', 'nursingList', 'nursingClinics', 'nursingOthers','serviceList', 'serviceClinics', 'animalList', 'animalClinics', 'deviceList', 'deviceClinics', 'languageList', 'languageClinics'));
    }
}
