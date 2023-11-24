<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Praxis;


class ImpressumController extends Controller
{
    public function index() {

        return view('impressum');
    }   
}
