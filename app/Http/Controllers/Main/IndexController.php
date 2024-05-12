<?php

namespace App\Http\Controllers\Main;

use App\Http\Filters\MainFilter;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Http\Controllers\Main\Controller;


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
            ->with(['images' => function ($query) {
                $query->select('clinic_id', 'url');
            }])->paginate(10);

        $therapies = Therapy::all();
 
        $selectedTherapies = $request->input('therapy_id', []);

        return view('search.index', compact('praxen', 'therapies', 'selectedTherapies'));
    }   
}
