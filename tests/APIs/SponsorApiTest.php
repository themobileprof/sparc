<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sponsor;

class SponsorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sponsor()
    {
        $sponsor = Sponsor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sponsors', $sponsor
        );

        $this->assertApiResponse($sponsor);
    }

    /**
     * @test
     */
    public function test_read_sponsor()
    {
        $sponsor = Sponsor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sponsors/'.$sponsor->id
        );

        $this->assertApiResponse($sponsor->toArray());
    }

    /**
     * @test
     */
    public function test_update_sponsor()
    {
        $sponsor = Sponsor::factory()->create();
        $editedSponsor = Sponsor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sponsors/'.$sponsor->id,
            $editedSponsor
        );

        $this->assertApiResponse($editedSponsor);
    }

    /**
     * @test
     */
    public function test_delete_sponsor()
    {
        $sponsor = Sponsor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sponsors/'.$sponsor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sponsors/'.$sponsor->id
        );

        $this->response->assertStatus(404);
    }
}
