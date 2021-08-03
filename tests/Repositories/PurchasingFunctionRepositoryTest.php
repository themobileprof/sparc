<?php namespace Tests\Repositories;

use App\Models\PurchasingFunction;
use App\Repositories\PurchasingFunctionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PurchasingFunctionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PurchasingFunctionRepository
     */
    protected $purchasingFunctionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->purchasingFunctionRepo = \App::make(PurchasingFunctionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->make()->toArray();

        $createdPurchasingFunction = $this->purchasingFunctionRepo->create($purchasingFunction);

        $createdPurchasingFunction = $createdPurchasingFunction->toArray();
        $this->assertArrayHasKey('id', $createdPurchasingFunction);
        $this->assertNotNull($createdPurchasingFunction['id'], 'Created PurchasingFunction must have id specified');
        $this->assertNotNull(PurchasingFunction::find($createdPurchasingFunction['id']), 'PurchasingFunction with given id must be in DB');
        $this->assertModelData($purchasingFunction, $createdPurchasingFunction);
    }

    /**
     * @test read
     */
    public function test_read_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();

        $dbPurchasingFunction = $this->purchasingFunctionRepo->find($purchasingFunction->id);

        $dbPurchasingFunction = $dbPurchasingFunction->toArray();
        $this->assertModelData($purchasingFunction->toArray(), $dbPurchasingFunction);
    }

    /**
     * @test update
     */
    public function test_update_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();
        $fakePurchasingFunction = PurchasingFunction::factory()->make()->toArray();

        $updatedPurchasingFunction = $this->purchasingFunctionRepo->update($fakePurchasingFunction, $purchasingFunction->id);

        $this->assertModelData($fakePurchasingFunction, $updatedPurchasingFunction->toArray());
        $dbPurchasingFunction = $this->purchasingFunctionRepo->find($purchasingFunction->id);
        $this->assertModelData($fakePurchasingFunction, $dbPurchasingFunction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_purchasing_function()
    {
        $purchasingFunction = PurchasingFunction::factory()->create();

        $resp = $this->purchasingFunctionRepo->delete($purchasingFunction->id);

        $this->assertTrue($resp);
        $this->assertNull(PurchasingFunction::find($purchasingFunction->id), 'PurchasingFunction should not exist in DB');
    }
}
