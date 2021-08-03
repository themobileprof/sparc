<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContextEntry;

class ContextEntryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_context_entry()
    {
        $contextEntry = ContextEntry::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/context_entries', $contextEntry
        );

        $this->assertApiResponse($contextEntry);
    }

    /**
     * @test
     */
    public function test_read_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/context_entries/'.$contextEntry->id
        );

        $this->assertApiResponse($contextEntry->toArray());
    }

    /**
     * @test
     */
    public function test_update_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();
        $editedContextEntry = ContextEntry::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/context_entries/'.$contextEntry->id,
            $editedContextEntry
        );

        $this->assertApiResponse($editedContextEntry);
    }

    /**
     * @test
     */
    public function test_delete_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/context_entries/'.$contextEntry->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/context_entries/'.$contextEntry->id
        );

        $this->response->assertStatus(404);
    }
}
