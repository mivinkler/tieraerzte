<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\TherapyList;

class MainController extends Controller
{
    public function index(FilterRequest $request) {

        $therapyList = TherapyList::all();
        $selectedTherapies = $request->input('therapy_id', []);

        return view('main.startsite', compact('therapyList', 'selectedTherapies'));
    }
}
