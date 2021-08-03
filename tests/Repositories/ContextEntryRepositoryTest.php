<?php namespace Tests\Repositories;

use App\Models\ContextEntry;
use App\Repositories\ContextEntryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContextEntryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContextEntryRepository
     */
    protected $contextEntryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contextEntryRepo = \App::make(ContextEntryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_context_entry()
    {
        $contextEntry = ContextEntry::factory()->make()->toArray();

        $createdContextEntry = $this->contextEntryRepo->create($contextEntry);

        $createdContextEntry = $createdContextEntry->toArray();
        $this->assertArrayHasKey('id', $createdContextEntry);
        $this->assertNotNull($createdContextEntry['id'], 'Created ContextEntry must have id specified');
        $this->assertNotNull(ContextEntry::find($createdContextEntry['id']), 'ContextEntry with given id must be in DB');
        $this->assertModelData($contextEntry, $createdContextEntry);
    }

    /**
     * @test read
     */
    public function test_read_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();

        $dbContextEntry = $this->contextEntryRepo->find($contextEntry->id);

        $dbContextEntry = $dbContextEntry->toArray();
        $this->assertModelData($contextEntry->toArray(), $dbContextEntry);
    }

    /**
     * @test update
     */
    public function test_update_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();
        $fakeContextEntry = ContextEntry::factory()->make()->toArray();

        $updatedContextEntry = $this->contextEntryRepo->update($fakeContextEntry, $contextEntry->id);

        $this->assertModelData($fakeContextEntry, $updatedContextEntry->toArray());
        $dbContextEntry = $this->contextEntryRepo->find($contextEntry->id);
        $this->assertModelData($fakeContextEntry, $dbContextEntry->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_context_entry()
    {
        $contextEntry = ContextEntry::factory()->create();

        $resp = $this->contextEntryRepo->delete($contextEntry->id);

        $this->assertTrue($resp);
        $this->assertNull(ContextEntry::find($contextEntry->id), 'ContextEntry should not exist in DB');
    }
}
