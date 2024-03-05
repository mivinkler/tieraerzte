<?php

namespace App\Http\Controllers\Admin\Praxis;

use App\Http\Controllers\Admin\Praxis\BaseController;
use App\Http\Requests\Praxis\StoreRequest;


class PraxisStoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();
        
        $createdPraxis = $this->service->store($data);

        return redirect()->route('main.praxis.show', ['praxis' => $createdPraxis->id]);
    }
}
