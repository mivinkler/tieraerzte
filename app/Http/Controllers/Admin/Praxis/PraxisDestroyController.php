<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Admin\Praxis\BaseController;
use App\Models\Clinic;

class PraxisDestroyController extends BaseController
{
    public function __invoke(Clinic $praxis) {
        $praxis->delete();
        return redirect()->route('praxis.index');
    }
}
