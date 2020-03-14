<?php namespace Tests\Repositories;

use App\Models\RequestSpecialists;
use App\Repositories\RequestSpecialistsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RequestSpecialistsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequestSpecialistsRepository
     */
    protected $requestSpecialistsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->requestSpecialistsRepo = \App::make(RequestSpecialistsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->make()->toArray();

        $createdRequestSpecialists = $this->requestSpecialistsRepo->create($requestSpecialists);

        $createdRequestSpecialists = $createdRequestSpecialists->toArray();
        $this->assertArrayHasKey('id', $createdRequestSpecialists);
        $this->assertNotNull($createdRequestSpecialists['id'], 'Created RequestSpecialists must have id specified');
        $this->assertNotNull(RequestSpecialists::find($createdRequestSpecialists['id']), 'RequestSpecialists with given id must be in DB');
        $this->assertModelData($requestSpecialists, $createdRequestSpecialists);
    }

    /**
     * @test read
     */
    public function test_read_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();

        $dbRequestSpecialists = $this->requestSpecialistsRepo->find($requestSpecialists->id);

        $dbRequestSpecialists = $dbRequestSpecialists->toArray();
        $this->assertModelData($requestSpecialists->toArray(), $dbRequestSpecialists);
    }

    /**
     * @test update
     */
    public function test_update_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();
        $fakeRequestSpecialists = factory(RequestSpecialists::class)->make()->toArray();

        $updatedRequestSpecialists = $this->requestSpecialistsRepo->update($fakeRequestSpecialists, $requestSpecialists->id);

        $this->assertModelData($fakeRequestSpecialists, $updatedRequestSpecialists->toArray());
        $dbRequestSpecialists = $this->requestSpecialistsRepo->find($requestSpecialists->id);
        $this->assertModelData($fakeRequestSpecialists, $dbRequestSpecialists->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();

        $resp = $this->requestSpecialistsRepo->delete($requestSpecialists->id);

        $this->assertTrue($resp);
        $this->assertNull(RequestSpecialists::find($requestSpecialists->id), 'RequestSpecialists should not exist in DB');
    }
}
