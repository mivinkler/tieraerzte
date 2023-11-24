<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clinic;


class IndexController extends Controller
{
    public function index() {
        $praxen = Clinic::all();

        return view('praxis.index', compact('praxen'));
    }   
}
