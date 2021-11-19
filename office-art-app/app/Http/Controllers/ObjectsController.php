<?php

namespace App\Http\Controllers;

use App\Service\MetMuseumAPIService;

class ObjectsController extends Controller
{
    /**
     * Fetches a listing of all valid Object IDs available for access at the
     * Metropolitan Museum of Art Collection API
     *
     * @param MetMuseumAPIService $service
     * @return array
     */
    public function index(MetMuseumAPIService $service) {
        return $service->objects();
    }
}
