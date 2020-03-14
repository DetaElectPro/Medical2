<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcceptRequestSpecialistsAPIRequest;
use App\Http\Requests\API\UpdateAcceptRequestSpecialistsAPIRequest;
use App\Models\AcceptRequestSpecialists;
use App\Repositories\AcceptRequestSpecialistsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AcceptRequestSpecialistsController
 * @package App\Http\Controllers\API
 */
class AcceptRequestSpecialistsAPIController extends AppBaseController
{
    /** @var  AcceptRequestSpecialistsRepository */
    private $acceptRequestSpecialistsRepository;

    public function __construct(AcceptRequestSpecialistsRepository $acceptRequestSpecialistsRepo)
    {
        $this->acceptRequestSpecialistsRepository = $acceptRequestSpecialistsRepo;
    }

    /**
     * Display a listing of the AcceptRequestSpecialists.
     * GET|HEAD /acceptRequestSpecialists
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository
            ->withPaginate(10, ['request.doctor']);

    }

    /**
     * Store a newly created AcceptRequestSpecialists in storage.
     * POST /acceptRequestSpecialists
     *
     * @param CreateAcceptRequestSpecialistsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAcceptRequestSpecialistsAPIRequest $request)
    {
        $user = auth('api')->user();
        $acceptRequest = new AcceptRequestSpecialists();
        $acceptRequest = $acceptRequest->acceptRequest($request, $user);
        return $acceptRequest;
    }

    /**
     * Display the specified AcceptRequestSpecialists.
     * GET|HEAD /acceptRequestSpecialists/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AcceptRequestSpecialists $acceptRequestSpecialists */
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            return $this->sendError('Accept Request Specialists not found');
        }

        return $this->sendResponse($acceptRequestSpecialists->toArray(), 'Accept Request Specialists retrieved successfully');
    }

    /**
     * Update the specified AcceptRequestSpecialists in storage.
     * PUT/PATCH /acceptRequestSpecialists/{id}
     *
     * @param int $id
     * @param UpdateAcceptRequestSpecialistsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcceptRequestSpecialistsAPIRequest $request)
    {
        $input = $request->all();

        /** @var AcceptRequestSpecialists $acceptRequestSpecialists */
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            return $this->sendError('Accept Request Specialists not found');
        }

        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->update($input, $id);

        return $this->sendResponse($acceptRequestSpecialists->toArray(), 'AcceptRequestSpecialists updated successfully');
    }

    /**
     * Remove the specified AcceptRequestSpecialists from storage.
     * DELETE /acceptRequestSpecialists/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AcceptRequestSpecialists $acceptRequestSpecialists */
        $acceptRequestSpecialists = $this->acceptRequestSpecialistsRepository->find($id);

        if (empty($acceptRequestSpecialists)) {
            return $this->sendError('Accept Request Specialists not found');
        }

        $acceptRequestSpecialists->delete();

        return $this->sendSuccess('Accept Request Specialists deleted successfully');
    }

    /**
     * acceptRequestByUser the specified AcceptRequestSpecialists in storage.
     * POST /acceptRequestByUser/{id}
     *
     * @param int $requestId
     * @return Response
     */
    public function acceptRequestByUser($requestId)
    {
//        return $request->header();
        $doctor_id = auth('api')->user()->id;
        $accept = new AcceptRequestSpecialists();
        return $accept->acceptRequestByUser($requestId, $doctor_id);
    }

    /**
     * acceptRequestByAdmin the specified AcceptRequestSpecialists in storage.
     * POST /acceptRequestByAdmin/{id}
     *
     * @param int $requestId
     * @return Response
     */
    public function acceptRequestByAdmin($requestId)
    {
        $userId = auth('api')->user()->id;
        $accept = new AcceptRequestSpecialists();
        return $accept->acceptRequestByAdmin($requestId, $userId);
    }

    /**
     * cancelRequestByAdmin the specified AcceptRequestSpecialists in update.
     * POST /cancelRequestByAdmin/{id}
     *
     * @param int $requestId
     * @return Response
     * @throws \Exception
     */
    public function cancelRequestByAdmin($requestId)
    {
        $userId = auth('api')->user()->id;
        $accept = new AcceptRequestSpecialists();
        return $accept->cancelRequestByAdmin($requestId, $userId);
    }

    /**
     * cancelRequestByUser the specified AcceptRequestSpecialists in storage.
     * POST /cancelRequestByUser/{id}
     *
     * @param int $requestId
     * @return Response
     */
    public function cancelRequestByUser($requestId)
    {
        $userId = auth('api')->user()->id;
        $accept = new AcceptRequestSpecialists();
        return $accept->cancelRequestByUser($requestId, $userId);
    }


    /**
     * acceptRequestAndDone the specified AcceptRequestSpecialists in storage.
     * POST /acceptRequestAndDone/{id}
     *
     * @param Request $request
     * @param int $requestId
     * @return Response
     */
    public function acceptRequestAndDone(Request $request, $requestId)
    {
        $userId = auth('api')->user()->id;
        $accept = new AcceptRequestSpecialists();
        return $accept->acceptRequestAndDone($requestId, $request, $userId);
    }
}
