<?php namespace Tests\Repositories;

use App\Models\ComponentEntry;
use App\Repositories\ComponentEntryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComponentEntryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComponentEntryRepository
     */
    protected $componentEntryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->componentEntryRepo = \App::make(ComponentEntryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->make()->toArray();

        $createdComponentEntry = $this->componentEntryRepo->create($componentEntry);

        $createdComponentEntry = $createdComponentEntry->toArray();
        $this->assertArrayHasKey('id', $createdComponentEntry);
        $this->assertNotNull($createdComponentEntry['id'], 'Created ComponentEntry must have id specified');
        $this->assertNotNull(ComponentEntry::find($createdComponentEntry['id']), 'ComponentEntry with given id must be in DB');
        $this->assertModelData($componentEntry, $createdComponentEntry);
    }

    /**
     * @test read
     */
    public function test_read_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();

        $dbComponentEntry = $this->componentEntryRepo->find($componentEntry->id);

        $dbComponentEntry = $dbComponentEntry->toArray();
        $this->assertModelData($componentEntry->toArray(), $dbComponentEntry);
    }

    /**
     * @test update
     */
    public function test_update_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();
        $fakeComponentEntry = ComponentEntry::factory()->make()->toArray();

        $updatedComponentEntry = $this->componentEntryRepo->update($fakeComponentEntry, $componentEntry->id);

        $this->assertModelData($fakeComponentEntry, $updatedComponentEntry->toArray());
        $dbComponentEntry = $this->componentEntryRepo->find($componentEntry->id);
        $this->assertModelData($fakeComponentEntry, $dbComponentEntry->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_component_entry()
    {
        $componentEntry = ComponentEntry::factory()->create();

        $resp = $this->componentEntryRepo->delete($componentEntry->id);

        $this->assertTrue($resp);
        $this->assertNull(ComponentEntry::find($componentEntry->id), 'ComponentEntry should not exist in DB');
    }
}
