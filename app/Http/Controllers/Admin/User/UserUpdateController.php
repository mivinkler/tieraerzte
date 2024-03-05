<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UserUpdateController extends BaseController 
{
    public function __invoke(UpdateRequest $request, User $user) {

        $data = $request->validated();
        
        $this->service->update($user, $data);

        return redirect()->route('admin.user.index', ['user' => $user->id]);
    }
}
