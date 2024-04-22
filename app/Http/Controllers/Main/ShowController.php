<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;


class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $praxis = Clinic::where('slug', $slug)
        ->with(['therapyClinics' => function ($query) {
            $query->select('clinic_id', 'therapy_id', 'category_id', 'therapy_title', 'therapy_text');
        }])
        ->with(['therapyOthers' => function ($query) {
            $query->select('clinic_id', 'therapy_other_id', 'category', 'therapy_other', 'therapy_other_text');
        }])
        ->firstOrFail();

        return view('main.show', compact('praxis'));
    }  
}  
