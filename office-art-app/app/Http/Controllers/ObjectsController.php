<?php

namespace App\Http\Controllers;

use App\Service\MetMuseumAPIService;

class ObjectsController extends Controller
{
    public function index(MetMuseumAPIService $service) {
        return $service->objects();
    }
}
