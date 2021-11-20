<?php

namespace App\Models\DTO;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class DepartmentList extends DataTransferObject
{
    /** @var Department[] */
    #[CastWith(ArrayCaster::class, itemType: Department::class)]
    public array $departments;
}