<?php

namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\TherapyList;
use App\Models\User;
use App\Models\TherapyOther;

class CreateController extends Controller 
{
    public function __invoke() {

        $therapyList = TherapyList::all();
        $roles = User::getRoles();
        // $therapyOthers = TherapyOther::all();

        return view('user.praxis_form', compact('therapyList', 'roles'));
    }
}

