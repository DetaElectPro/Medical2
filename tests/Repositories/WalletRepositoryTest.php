<?php namespace Tests\Repositories;

use App\Models\Wallet;
use App\Repositories\WalletRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WalletRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WalletRepository
     */
    protected $walletRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->walletRepo = \App::make(WalletRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_wallet()
    {
        $wallet = factory(Wallet::class)->make()->toArray();

        $createdWallet = $this->walletRepo->create($wallet);

        $createdWallet = $createdWallet->toArray();
        $this->assertArrayHasKey('id', $createdWallet);
        $this->assertNotNull($createdWallet['id'], 'Created Wallet must have id specified');
        $this->assertNotNull(Wallet::find($createdWallet['id']), 'Wallet with given id must be in DB');
        $this->assertModelData($wallet, $createdWallet);
    }

    /**
     * @test read
     */
    public function test_read_wallet()
    {
        $wallet = factory(Wallet::class)->create();

        $dbWallet = $this->walletRepo->find($wallet->id);

        $dbWallet = $dbWallet->toArray();
        $this->assertModelData($wallet->toArray(), $dbWallet);
    }

    /**
     * @test update
     */
    public function test_update_wallet()
    {
        $wallet = factory(Wallet::class)->create();
        $fakeWallet = factory(Wallet::class)->make()->toArray();

        $updatedWallet = $this->walletRepo->update($fakeWallet, $wallet->id);

        $this->assertModelData($fakeWallet, $updatedWallet->toArray());
        $dbWallet = $this->walletRepo->find($wallet->id);
        $this->assertModelData($fakeWallet, $dbWallet->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_wallet()
    {
        $wallet = factory(Wallet::class)->create();

        $resp = $this->walletRepo->delete($wallet->id);

        $this->assertTrue($resp);
        $this->assertNull(Wallet::find($wallet->id), 'Wallet should not exist in DB');
    }
}
