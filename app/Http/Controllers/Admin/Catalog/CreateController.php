<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Main\Controller;

class CreateController extends Controller
{
    public function __invoke($type)
    {
        return view('admin.catalog.form', compact('type'));
    }
}
