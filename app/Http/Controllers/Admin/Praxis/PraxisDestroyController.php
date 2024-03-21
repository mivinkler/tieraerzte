<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;

class PraxisDestroyController extends Controller
{
    public function __invoke(Clinic $praxis) 
    {
        $praxis->delete();

        return redirect()->route('admin.praxis.index');
    }
}
