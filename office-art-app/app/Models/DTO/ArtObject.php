<?php

namespace App\Models\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ArtObject extends DataTransferObject
{
    #[MapFrom('objectID')]
    public int $id;

    #[MapFrom('title')]
    public string $title;

    #[MapFrom('objectDate')]
    public string $date;

    #[MapFrom('department')]
    public string $department;

    #[MapFrom('artistDisplayName')]
    public string $artist;

    #[MapFrom('primaryImage')]
    public string $imageUrl;
}