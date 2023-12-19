<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use App\Models\Text;
use App\Models\ServiceOther;

class EditController extends Controller 
{
    public function edit(Clinic $praxis) {
        $services = Service::all();
        $ServiceOthers = ServiceOther::all();
        return view('praxis.edit', compact('services', 'praxis'));
    }
}
