<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Filters\UserFilter;
use App\Http\Requests\User\FilterRequest;
use App\Models\User;
use App\Http\Controllers\Main\Controller;


class UserIndexController extends Controller
{
    public function __invoke(FilterRequest $request) {     

        $data = $request->validated();

        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        $users = User::filter($filter)->simplePaginate(50);

        return view('admin.user.index', compact('users'));
    }
}
