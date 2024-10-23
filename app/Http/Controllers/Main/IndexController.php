<?php

namespace App\Http\Controllers\Main;

use App\Http\Filters\MainFilter;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Clinic;
use App\Models\TherapyList;
use App\Http\Controllers\Main\Controller;
use App\Models\DeviceClinic;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {
      
        $data = $request->validated();

        $filter = app()->make(MainFilter::class, ['queryParams' => array_filter($data)]);

        $praxen = Clinic::select('id', 'title', 'street', 'house', 'postcode', 'locality', 'slug')
            ->filter($filter)
            ->with(['therapyClinics' => function ($query) {
                $query->select('clinic_id', 'therapy_id', 'therapy_title', 'therapy_text');
            }])
            ->with(['deviceClinics' => function ($query) {
                $query->select('clinic_id', 'device_id', 'device_title')->with(['deviceList' => function ($subQuery) {
                    $subQuery->select('id', 'icon_path');
                }]);
            }])
            ->with(['images' => function ($query) {
                $query->select('clinic_id', 'foto_path');
            }])->paginate(10);

       

        $therapyList = TherapyList::all();
        $selectedTherapies = $request->input('therapy_id', []);

        return view('main.index', compact('praxen', 'therapyList', 'selectedTherapies'));
    }   
}

