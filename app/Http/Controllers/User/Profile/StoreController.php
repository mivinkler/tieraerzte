<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\User\Profile\BaseController;
use App\Http\Requests\User\StoreRequest;


class StoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $createdUser = $this->service->store($data);

        return redirect()->route('user.profile.edit', ['user' => $createdUser->id]);
    }
}
