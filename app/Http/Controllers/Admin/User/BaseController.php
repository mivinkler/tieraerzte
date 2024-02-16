<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Main\Controller;
use App\Services\User\Service;

class BaseController extends Controller {
    
    public $service;

    public function __construct(Service $service) {
       
        $this->service = $service;
    }
}
