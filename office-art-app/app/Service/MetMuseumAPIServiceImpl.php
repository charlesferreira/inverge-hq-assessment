<?php

namespace App\Service;

class MetMuseumAPIServiceImpl implements MetMuseumAPIService
{
    public function objects(): array {
        return [
            'total' => 3,
            'objectIDs' => [1, 2, 3]
        ];
    }
}