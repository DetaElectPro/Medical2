<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\RequestSpecialists;

class RequestSpecialistsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/request_specialists', $requestSpecialists
        );

        $this->assertApiResponse($requestSpecialists);
    }

    /**
     * @test
     */
    public function test_read_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/request_specialists/'.$requestSpecialists->id
        );

        $this->assertApiResponse($requestSpecialists->toArray());
    }

    /**
     * @test
     */
    public function test_update_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();
        $editedRequestSpecialists = factory(RequestSpecialists::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/request_specialists/'.$requestSpecialists->id,
            $editedRequestSpecialists
        );

        $this->assertApiResponse($editedRequestSpecialists);
    }

    /**
     * @test
     */
    public function test_delete_request_specialists()
    {
        $requestSpecialists = factory(RequestSpecialists::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/request_specialists/'.$requestSpecialists->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/request_specialists/'.$requestSpecialists->id
        );

        $this->response->assertStatus(404);
    }
}
