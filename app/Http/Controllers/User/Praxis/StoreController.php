<?php

namespace App\Http\Controllers\User\Praxis;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Main\BaseController;
use App\Http\Requests\Praxis\StoreRequest;
use App\Models\Clinic;

class StoreController extends BaseController 
{
    public function __invoke(StoreRequest $request, Clinic $praxis) { 

        $data = $request->validated();

        $createdPraxis = $this->service->createClinic($data);
        /** @var \Illuminate\Database\Eloquent\Model $user */
        $user = Auth::user();
        $user->update(['clinic_id' => $createdPraxis->id]);

        return redirect()->route('praxis.show', ['slug' => $createdPraxis->slug, 'id' => $createdPraxis->id]);
    }
}
