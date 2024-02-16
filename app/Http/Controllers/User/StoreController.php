<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\BaseController;
use App\Http\Requests\Praxis\StoreRequest;


class StoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $createdPraxis = $this->service->store($data);

        return redirect()->route('praxis.show', ['praxis' => $createdPraxis->id]);
    }
}
