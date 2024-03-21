<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Filters\PraxisFilter;
use App\Http\Requests\Praxis\FilterRequest;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Http\Controllers\Main\Controller;


class PraxisIndexController extends Controller
{
    public function __invoke(FilterRequest $request) {

        $data = $request->validated();

        $filter = app()->make(PraxisFilter::class, ['queryParams' => array_filter($data)]);

        $praxen = Clinic::filter($filter)->simplePaginate(50);
        
        $therapies = Therapy::all();

        $selectedTherapies = $request->input('therapy_id', []);

        return view('admin.praxis.index', compact('praxen', 'therapies', 'selectedTherapies'));
    }   
}
