<?php namespace Tests\Repositories;

use App\Models\Sponsor;
use App\Repositories\SponsorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SponsorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SponsorRepository
     */
    protected $sponsorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sponsorRepo = \App::make(SponsorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sponsor()
    {
        $sponsor = Sponsor::factory()->make()->toArray();

        $createdSponsor = $this->sponsorRepo->create($sponsor);

        $createdSponsor = $createdSponsor->toArray();
        $this->assertArrayHasKey('id', $createdSponsor);
        $this->assertNotNull($createdSponsor['id'], 'Created Sponsor must have id specified');
        $this->assertNotNull(Sponsor::find($createdSponsor['id']), 'Sponsor with given id must be in DB');
        $this->assertModelData($sponsor, $createdSponsor);
    }

    /**
     * @test read
     */
    public function test_read_sponsor()
    {
        $sponsor = Sponsor::factory()->create();

        $dbSponsor = $this->sponsorRepo->find($sponsor->id);

        $dbSponsor = $dbSponsor->toArray();
        $this->assertModelData($sponsor->toArray(), $dbSponsor);
    }

    /**
     * @test update
     */
    public function test_update_sponsor()
    {
        $sponsor = Sponsor::factory()->create();
        $fakeSponsor = Sponsor::factory()->make()->toArray();

        $updatedSponsor = $this->sponsorRepo->update($fakeSponsor, $sponsor->id);

        $this->assertModelData($fakeSponsor, $updatedSponsor->toArray());
        $dbSponsor = $this->sponsorRepo->find($sponsor->id);
        $this->assertModelData($fakeSponsor, $dbSponsor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sponsor()
    {
        $sponsor = Sponsor::factory()->create();

        $resp = $this->sponsorRepo->delete($sponsor->id);

        $this->assertTrue($resp);
        $this->assertNull(Sponsor::find($sponsor->id), 'Sponsor should not exist in DB');
    }
}
