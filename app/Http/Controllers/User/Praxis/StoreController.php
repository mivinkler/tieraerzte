<?php

namespace App\Http\Controllers\User\Praxis;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main\BaseController;
use App\Http\Requests\Praxis\StoreRequest;


class StoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $createdPraxis = $this->service->store($data);

        $praxisId = $createdPraxis->id;

        $user = Auth::user();
        
        /** @var \Illuminate\Database\Eloquent\Model $user */
         $user->update(['clinic_id' => $praxisId]);

        return redirect()->route('main.praxis.show', $createdPraxis->id);
    }
}
