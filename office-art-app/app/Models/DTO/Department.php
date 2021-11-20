<?php

namespace App\Models\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Department extends DataTransferObject
{
    #[MapFrom('departmentId')]
    public int $id;

    #[MapFrom('displayName')]
    public string $name;
}