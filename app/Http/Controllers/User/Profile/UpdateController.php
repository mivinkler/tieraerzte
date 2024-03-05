<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\User\Profile\BaseController;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;


class UpdateController extends BaseController 
{
    public function __invoke(UpdateRequest $request, User $user) {        
        
        $data = $request->validated();
        
        $this->service->update($user, $data);

        return redirect()->route('profile.edit', ['user' => $user->id]);
    }
}
