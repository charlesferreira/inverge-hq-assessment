<?php

namespace Tests\Feature;

use App\Models\DTO\DepartmentList;
use App\Service\MetMuseumAPIService;
use Mockery\MockInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Tests\TestCase;

class DepartmentsControllerTest extends TestCase
{
    /**
     * Tests that can get a list of departments from the API
     * @throws UnknownProperties
     */
    public function test_loading_the_departments_list() {
        $departments = [
            ['departmentId' => 1, 'displayName' => 'Department 1'],
            ['departmentId' => 2, 'displayName' => 'Department 2']
        ];
        $mockData = new DepartmentList(compact('departments'));

        $this->mock(MetMuseumAPIService::class, function (MockInterface $mock) use ($mockData) {
            $mock->shouldReceive('departments')->once()->andReturn($mockData);
        });

        $response = $this->get('/api/departments');

        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($departments));
    }
}
