<?php

namespace App\Service;

use App\Models\DTO\ArtObject;
use App\Models\DTO\ArtObjectList;

/**
 * Provides abstraction over the Metropolitan Museum of Art Collection API.
 */
interface MetMuseumAPIService
{
    /**
     * Returns a listing of all valid Object IDs available for access.
     *
     * @return ArtObjectList
     */
    public function objects(): ArtObjectList;

    /**
     * Returns a record for an object, containing all open access data about
     * that object, including its image if it's available under Open Access.
     *
     * @param int $id
     * @return ArtObject
     */
    public function object(int $id): ArtObject;
}