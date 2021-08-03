<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ComponentEntry;

class ComponentEntryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/component_entries', $componentEntry
        );

        $this->assertApiResponse($componentEntry);
    }

    /**
     * @test
     */
    public function test_read_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/component_entries/'.$componentEntry->id
        );

        $this->assertApiResponse($componentEntry->toArray());
    }

    /**
     * @test
     */
    public function test_update_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();
        $editedComponentEntry = ComponentEntry::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/component_entries/'.$componentEntry->id,
            $editedComponentEntry
        );

        $this->assertApiResponse($editedComponentEntry);
    }

    /**
     * @test
     */
    public function test_delete_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/component_entries/'.$componentEntry->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/component_entries/'.$componentEntry->id
        );

        $this->response->assertStatus(404);
    }
}
