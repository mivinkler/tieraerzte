<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use App\Models\ServiceOther;

class CreateController extends Controller 
{
    public function create(Clinic $praxis) {
        $services = Service::all();
        $ServiceOthers = ServiceOther::all();
        $praxis = Clinic::first();

        return view('praxis.create', compact('services', 'praxis'));
    }
}

