<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Main\Controller;

class ImpressumController extends Controller
{
    public function index() {

        return view('impressum');
    }   
}
