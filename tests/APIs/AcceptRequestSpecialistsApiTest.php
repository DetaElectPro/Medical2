<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AcceptRequestSpecialists;

class AcceptRequestSpecialistsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accept_request_specialists', $acceptRequestSpecialists
        );

        $this->assertApiResponse($acceptRequestSpecialists);
    }

    /**
     * @test
     */
    public function test_read_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/accept_request_specialists/'.$acceptRequestSpecialists->id
        );

        $this->assertApiResponse($acceptRequestSpecialists->toArray());
    }

    /**
     * @test
     */
    public function test_update_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();
        $editedAcceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accept_request_specialists/'.$acceptRequestSpecialists->id,
            $editedAcceptRequestSpecialists
        );

        $this->assertApiResponse($editedAcceptRequestSpecialists);
    }

    /**
     * @test
     */
    public function test_delete_accept_request_specialists()
    {
        $acceptRequestSpecialists = factory(AcceptRequestSpecialists::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accept_request_specialists/'.$acceptRequestSpecialists->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accept_request_specialists/'.$acceptRequestSpecialists->id
        );

        $this->response->assertStatus(404);
    }
}
