<?php

namespace Tests\Feature;

use App\Models\DTO\ArtObject;
use App\Models\DTO\ArtObjectList;
use App\Service\MetMuseumAPIService;
use Mockery\MockInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Tests\TestCase;

class ObjectsControllerTest extends TestCase
{
    /**
     * Tests that can get a list of objects from the API
     * @throws UnknownProperties
     */
    public function test_loading_the_object_list() {
        $mockData = new ArtObjectList([
            'total' => 3,
            'objectIDs' => [1, 2, 3]
        ]);

        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) use ($mockData) {
            $mock->shouldReceive('objects')->once()->andReturn($mockData);
        });

        $response = $this->get('/api/objects');

        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($mockData->toArray()));
    }

    /**
     * Tests that can get an object's details from the API
     * @throws UnknownProperties
     */
    public function test_loading_a_single_object() {
        $mockData = new ArtObject([
            'objectID' => 1,
            'title' => "A title",
            'objectDate' => "A date",
            'department' => "A department",
            'artistDisplayName' => "An artist",
            'primaryImage' => "A URL"
        ]);

        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) use ($mockData) {
            $mock->shouldReceive('object')->with($mockData->id)->once()->andReturn($mockData);
        });

        $response = $this->get('/api/objects/1');

        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($mockData->toArray()));
    }
}
