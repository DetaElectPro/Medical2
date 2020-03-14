<?php namespace Tests\Repositories;

use App\Models\AcceptRequestSpecialists;
use App\Repositories\AcceptRequestSpecialistsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AcceptRequestSpecialistsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AcceptRequestSpecialistsRepository
     */
    protected $acceptRequestSpecialistsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->acceptRequestSpecialistsRepo = \App::make(AcceptRequestSpecialistsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->make()->toArray();

        $createdAcceptRequestSpecialists = $this->acceptRequestSpecialistsRepo->create($acceptRequestSpecialists);

        $createdAcceptRequestSpecialists = $createdAcceptRequestSpecialists->toArray();
        $this->assertArrayHasKey('id', $createdAcceptRequestSpecialists);
        $this->assertNotNull($createdAcceptRequestSpecialists['id'], 'Created AcceptRequestSpecialists must have id specified');
        $this->assertNotNull(AcceptRequestSpecialists::find($createdAcceptRequestSpecialists['id']), 'AcceptRequestSpecialists with given id must be in DB');
        $this->assertModelData($acceptRequestSpecialists, $createdAcceptRequestSpecialists);
    }

    /**
     * @test read
     */
    public function test_read_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();

        $dbAcceptRequestSpecialists = $this->acceptRequestSpecialistsRepo->find($acceptRequestSpecialists->id);

        $dbAcceptRequestSpecialists = $dbAcceptRequestSpecialists->toArray();
        $this->assertModelData($acceptRequestSpecialists->toArray(), $dbAcceptRequestSpecialists);
    }

    /**
     * @test update
     */
    public function test_update_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();
        $fakeAcceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->make()->toArray();

        $updatedAcceptRequestSpecialists = $this->acceptRequestSpecialistsRepo->update($fakeAcceptRequestSpecialists, $acceptRequestSpecialists->id);

        $this->assertModelData($fakeAcceptRequestSpecialists, $updatedAcceptRequestSpecialists->toArray());
        $dbAcceptRequestSpecialists = $this->acceptRequestSpecialistsRepo->find($acceptRequestSpecialists->id);
        $this->assertModelData($fakeAcceptRequestSpecialists, $dbAcceptRequestSpecialists->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();

        $resp = $this->acceptRequestSpecialistsRepo->delete($acceptRequestSpecialists->id);

        $this->assertTrue($resp);
        $this->assertNull(AcceptRequestSpecialists::find($acceptRequestSpecialists->id), 'AcceptRequestSpecialists should not exist in DB');
    }
}
