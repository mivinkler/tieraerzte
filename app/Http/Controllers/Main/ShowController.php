<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;


class ShowController extends Controller
{
    public function __invoke(Clinic $praxis, $slug)
    {
        $praxis = Clinic::where('slug', $slug)->firstOrFail();

        return view('main.show', compact('praxis'));
    }  
}  
