<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PurchasingFunction;

class PurchasingFunctionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/purchasing_functions', $purchasingFunction
        );

        $this->assertApiResponse($purchasingFunction);
    }

    /**
     * @test
     */
    public function test_read_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/purchasing_functions/'.$purchasingFunction->id
        );

        $this->assertApiResponse($purchasingFunction->toArray());
    }

    /**
     * @test
     */
    public function test_update_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();
        $editedPurchasingFunction = PurchasingFunction::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/purchasing_functions/'.$purchasingFunction->id,
            $editedPurchasingFunction
        );

        $this->assertApiResponse($editedPurchasingFunction);
    }

    /**
     * @test
     */
    public function test_delete_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/purchasing_functions/'.$purchasingFunction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/purchasing_functions/'.$purchasingFunction->id
        );

        $this->response->assertStatus(404);
    }
}
