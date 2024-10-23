<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Filters\PraxisFilter;
use App\Http\Requests\Praxis\FilterRequest;
use App\Models\Clinic;
use App\Models\TherapyList;
use App\Http\Controllers\Main\Controller;


class PraxisIndexController extends Controller
{

    public function __invoke(FilterRequest $request) {

        $data = $request->validated();

        $filter = app()->make(PraxisFilter::class, ['queryParams' => array_filter($data)]);

        $praxen = Clinic::filter($filter)->simplePaginate(50);
        
        $therapyList = TherapyList::all();

        $selectedTherapies = $request->input('therapy_id', []);

        return view('admin.praxis.praxis_index', compact('praxen', 'therapyList', 'selectedTherapies'));
    }   
}
