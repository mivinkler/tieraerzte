<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;


class ShowController extends Controller
{
    public function show(Clinic $praxis) {

        return view('praxis.show', compact('praxis'));
    }
}  
