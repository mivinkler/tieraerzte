<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;


class ShowController extends Controller
{
    public function __invoke($id, $slug)
    {
        // Используем условия для поиска клиники по id и slug
        $praxis = Clinic::where('id', $id)
            ->where('slug', $slug)
            ->with(['therapyClinics' => function ($query) {
                $query->select('clinic_id', 'therapy_id', 'therapy_title', 'therapy_text');
            }, 'therapyOthers' => function ($query) {
                $query->select('clinic_id', 'therapy_other_id', 'therapy_other_title', 'therapy_other_text');
            }])
            ->firstOrFail();
    
        return view('main.show', compact('praxis'));
    }  
}
