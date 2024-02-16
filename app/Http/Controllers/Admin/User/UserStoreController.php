<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Http\Requests\User\StoreRequest;


class UserStoreController extends BaseController 
{
    public function __invoke(StoreRequest $request) { 

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.user.index');
    }
}
