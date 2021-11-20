<?php

namespace App\Http\Controllers;

use App\Service\MetMuseumAPIService;

class DepartmentsController extends Controller
{
    /**
     * @var MetMuseumAPIService
     */
    private MetMuseumAPIService $service;

    /**
     * @param MetMuseumAPIService $service
     */
    public function __construct(MetMuseumAPIService $service) {
        $this->service = $service;
    }

    /**
     * Returns a listing of all departments.
     *
     * @return array
     */
    public function index(): array {
        return $this->service->departments()->toArray();
    }

    /**
     * Fetches the details for a given object using Metropolitan Museum of Art
     * Collection API.
     *
     * @param $id
     * @return array
     */
    public function show($id): array {
        return $this->service->object($id)->toArray();
    }
}
