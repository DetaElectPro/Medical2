<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEmployAPIRequest;
use App\Http\Requests\API\UpdateEmployAPIRequest;
use App\Models\Employ;
use App\Models\Wallet;
use App\Repositories\EmployRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;


/**
 * Class EmployController
 * @package App\Http\Controllers\API
 */
class EmployAPIController extends AppBaseController
{
    /** @var  EmployRepository */
    private $employRepository;

    public function __construct(EmployRepository $employRepo)
    {
        $this->employRepository = $employRepo;
    }

    /**
     * Display a listing of the Employ.
     * GET|HEAD /employs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $employs = $this->employRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($employs->toArray(), 'Employs retrieved successfully');
    }

    /**
     * Store a newly created Employ in storage.
     * POST /employs
     *
     * @param CreateEmployAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployAPIRequest $request)
    {
        $request->merge(['cv' => 'null']);
        $input = $request->all();
        $employ = $this->employRepository->createApi($input);
        $user = User::where('id', auth('api')->user()->id)->first();
        $user->status = env('STATUS_MEDICAL');
        $user->save();
        $wallet = new Wallet();
        $wallet->createWallet();
        return $this->sendResponse($employ->toArray(), 'Employ saved successfully');
    }

    /**
     * Display the specified Employ.
     * GET|HEAD /employs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        return $this->sendResponse($employ->toArray(), 'Employ retrieved successfully');
    }

    /**
     * Update the specified Employ in storage.
     * PUT/PATCH /employs/{id}
     *
     * @param int $id
     * @param UpdateEmployAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployAPIRequest $request)
    {
        $input = $request->all();

        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        $employ = $this->employRepository->update($input, $id);

        return $this->sendResponse($employ->toArray(), 'Employ updated successfully');
    }

    /**
     * Remove the specified Employ from storage.
     * DELETE /employs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Employ $employ */
        $employ = $this->employRepository->find($id);

        if (empty($employ)) {
            return $this->sendError('Employ not found');
        }

        $employ->delete();

        return $this->sendSuccess('Employ deleted successfully');
    }

    public function saveFile($request)
    {
        $userId = auth('api')->user()->id;
        $random = Str::random(10);
        if ($request->hasfile('cv')) {
            $image = $request->file('cv');
            $name = $random . 'cv_' . $userId . ".pdf";
            $image->move(public_path() . '/cv/', $name);
            $name = url("cv/$name");

            return $name;
        }
        return false;
    }
}
