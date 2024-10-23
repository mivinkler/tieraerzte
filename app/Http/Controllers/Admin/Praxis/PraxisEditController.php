<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\TherapyList;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PraxisEditController extends Controller 
{
    public function __invoke(Clinic $praxis) {

        $therapyList = TherapyList::all();
        
        $therapyOthers = $praxis->therapyOthers()->get();

        $layout = (Auth::user()->role === User::ROLE_ADMIN) ? 'layouts.admin' : 'layouts.user';

        return view('admin.praxis.praxis_form', compact('praxis', 'layout', 'therapyList', 'therapyOthers'));
    }
}
