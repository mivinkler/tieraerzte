<?php


namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Main\Controller;
use App\Services\User\Service;

class BaseController extends Controller {
    public $service;

    public function __construct(Service $service) {
       
        $this->service = $service;
    }
}
