<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Wallet;

class WalletApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_wallet()
    {
        $wallet = factory(Wallet::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/wallets', $wallet
        );

        $this->assertApiResponse($wallet);
    }

    /**
     * @test
     */
    public function test_read_wallet()
    {
        $wallet = factory(Wallet::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/wallets/'.$wallet->id
        );

        $this->assertApiResponse($wallet->toArray());
    }

    /**
     * @test
     */
    public function test_update_wallet()
    {
        $wallet = factory(Wallet::class)->create();
        $editedWallet = factory(Wallet::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/wallets/'.$wallet->id,
            $editedWallet
        );

        $this->assertApiResponse($editedWallet);
    }

    /**
     * @test
     */
    public function test_delete_wallet()
    {
        $wallet = factory(Wallet::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/wallets/'.$wallet->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/wallets/'.$wallet->id
        );

        $this->response->assertStatus(404);
    }
}
