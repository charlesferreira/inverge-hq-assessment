<?php

namespace App\Http\Controllers;

use App\Service\MetMuseumAPIService;

class ObjectsController extends Controller
{
    /**
     * @var MetMuseumAPIService
     */
    private $service;

    /**
     * @param MetMuseumAPIService $service
     */
    public function __construct(MetMuseumAPIService $service) {
        $this->service = $service;
    }

    /**
     * Fetches a listing of all valid Object IDs available for access at the
     * Metropolitan Museum of Art Collection API
     *
     * @param MetMuseumAPIService $service
     * @return array
     */
    public function index() {
        return $this->service->objects();
    }
}
