<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\BaseController;
use App\Http\Requests\Praxis\UpdateRequest;
use App\Models\Clinic;


class PraxisUpdateController extends BaseController 
{
    public function __invoke(UpdateRequest $request, Clinic $praxis) {

        $data = $request->validated();

        $this->service->update($praxis, $data);

        return redirect()->route('praxis.show', $praxis->slug);
    }
}
