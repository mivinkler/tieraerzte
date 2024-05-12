<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;


class ShowController extends Controller
{
    public function __invoke($slug, $id)
    {
        $praxis = Clinic::with(['therapyClinics' => function ($query) {
            $query->select('clinic_id', 'therapy_id', 'category', 'therapy_title', 'therapy_text');
        }, 'therapyOthers' => function ($query) {
            $query->select('clinic_id', 'other_id', 'category', 'other_title', 'other_text');
        }])->findOrFail($id);
    
        return view('praxis.show', compact('praxis'));
    }  
}  
