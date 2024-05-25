<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Main\BaseController;
use App\Http\Requests\Praxis\StoreRequest;
use App\Models\Clinic;

class PraxisStoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();
        $createdPraxis = $this->service->createClinic($data);

        return redirect()->route('praxis.show', ['slug' => $createdPraxis->slug, 'id' => $createdPraxis->id]);
    }
}
