<?php

namespace Tests\Feature;

use App\Service\MetMuseumAPIService;
use Mockery\MockInterface;
use Tests\TestCase;

class ObjectsControllerTest extends TestCase
{
    public function test_loading_the_object_list() {
        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) {
            $mock->shouldReceive('objects')->once()->andReturn([
                'total' => 3,
                'objectIDs' => [1, 2, 3]
            ]);
        });

        $response = $this->get('/api/objects');

        $response->assertStatus(200);
        $response->assertJsonStructure(['total', 'objectIDs']);
    }
}
