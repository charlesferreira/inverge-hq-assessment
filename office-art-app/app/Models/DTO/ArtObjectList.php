<?php

namespace App\Models\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class ArtObjectList extends DataTransferObject
{
    public int $total;

    public array $objectIDs;
}