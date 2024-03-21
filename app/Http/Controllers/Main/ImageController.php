<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) 
    {
        $path = $request->file('image')->store('images', 'public');

        return view('create', ['path' => $path]);
    }
}
