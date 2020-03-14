<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Repositories\WalletRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WalletController extends AppBaseController
{
    /** @var  WalletRepository */
    private $walletRepository;

    public function __construct(WalletRepository $walletRepo)
    {
        $this->walletRepository = $walletRepo;
    }

    /**
     * Display a listing of the Wallet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wallets = $this->walletRepository->all();

        return view('wallets.index')
            ->with('wallets', $wallets);
    }

    /**
     * Show the form for creating a new Wallet.
     *
     * @return Response
     */
    public function create()
    {
        return view('wallets.create');
    }

    /**
     * Store a newly created Wallet in storage.
     *
     * @param CreateWalletRequest $request
     *
     * @return Response
     */
    public function store(CreateWalletRequest $request)
    {
        $input = $request->all();

        $wallet = $this->walletRepository->create($input);

        Flash::success('Wallet saved successfully.');

        return redirect(route('wallets.index'));
    }

    /**
     * Display the specified Wallet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wallet = $this->walletRepository->find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('wallets.index'));
        }

        return view('wallets.show')->with('wallet', $wallet);
    }

    /**
     * Show the form for editing the specified Wallet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wallet = $this->walletRepository->find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('wallets.index'));
        }

        return view('wallets.edit')->with('wallet', $wallet);
    }

    /**
     * Update the specified Wallet in storage.
     *
     * @param int $id
     * @param UpdateWalletRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWalletRequest $request)
    {
        $wallet = $this->walletRepository->find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('wallets.index'));
        }

        $wallet = $this->walletRepository->update($request->all(), $id);

        Flash::success('Wallet updated successfully.');

        return redirect(route('wallets.index'));
    }

    /**
     * Remove the specified Wallet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wallet = $this->walletRepository->find($id);

        if (empty($wallet)) {
            Flash::error('Wallet not found');

            return redirect(route('wallets.index'));
        }

        $this->walletRepository->delete($id);

        Flash::success('Wallet deleted successfully.');

        return redirect(route('wallets.index'));
    }
}
