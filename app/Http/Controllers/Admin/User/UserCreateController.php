<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\Therapy;
use App\Models\TherapyOther;


class UserCreateController extends Controller 
{
    public function __invoke() {
        $therapies = Therapy::all();
        $therapyOthers = TherapyOther::all();
        $praxis = Clinic::first();

        return view('admin.user.create', compact('therapies', 'praxis'));
    }
}

