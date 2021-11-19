<?php

namespace App\Service;

/**
 * Provides abstraction over the Metropolitan Museum of Art Collection API
 */
interface MetMuseumAPIService
{
    /**
     * Returns a listing of all valid Object IDs available for access
     * @return array
     */
    public function objects(): array;
}