<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\TherapyList;
use App\Models\User;

class PraxisCreateController extends Controller 
{
    public function __invoke() {

        $therapyList = TherapyList::all();
        $roles = User::getRoles();
        
        return view('admin.praxis.praxis_form', compact('therapyList', 'roles'));
    }
}

