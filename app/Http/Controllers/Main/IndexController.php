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

        $praxen = Clinic::filter($filter)->simplePaginate(10);

        $therapies = Therapy::all();

        $selectedTherapies = $request->input('therapy_id', []);

        return view('main.index', compact('praxen', 'therapies', 'selectedTherapies'));
    }   
}
