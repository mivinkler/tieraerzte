<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Therapy;

class MainController extends Controller
{
    public function index(FilterRequest $request) {

        $therapies = Therapy::all();
        $selectedTherapies = $request->input('therapy_id', []);

        return view('main.startsite', compact('therapies', 'selectedTherapies'));
    }
}
