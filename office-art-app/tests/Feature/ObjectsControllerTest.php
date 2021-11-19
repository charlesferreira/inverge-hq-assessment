<?php

namespace Tests\Feature;

use App\Service\MetMuseumAPIService;
use Mockery\MockInterface;
use Tests\TestCase;

class ObjectsControllerTest extends TestCase
{
    /**
     * Tests that can get a list of objects from the API
     */
    public function test_loading_the_object_list() {
        $mockData = [
            'total' => 3,
            'objectIDs' => [1, 2, 3]
        ];

        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) use ($mockData) {
            $mock->shouldReceive('objects')->once()->andReturn($mockData);
        });

        $response = $this->get('/api/objects');

        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($mockData));
    }

    /**
     * Tests that can get an object's details from the API
     */
    public function test_loading_a_single_object() {
        $mockData = [
            'id' => 1,
            'title' => 'A title',
            'data' => 'A date',
            'department' => 'A department',
            'artist' => 'An artist'
        ];

        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) use ($mockData) {
            $mock->shouldReceive('object')->once()->andReturn($mockData);
        });

        $response = $this->get('/api/objects/1');

        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($mockData));
    }
}
