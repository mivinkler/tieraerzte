<?php


namespace App\Http\Controllers\User\Praxis;

use App\Http\Controllers\Main\Controller;
use App\Services\Praxis\Service;

class BaseController extends Controller {
    public $service;

    public function __construct(Service $service) {
       
        $this->service = $service;
    }
}
