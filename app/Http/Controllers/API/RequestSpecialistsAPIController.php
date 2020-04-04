<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRequestSpecialistsAPIRequest;
use App\Http\Requests\API\UpdateRequestSpecialistsAPIRequest;
use App\Models\RequestSpecialists;
use App\Models\Wallet;
use App\Repositories\RequestSpecialistsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RequestSpecialistsController
 * @package App\Http\Controllers\API
 */
class RequestSpecialistsAPIController extends AppBaseController
{
    /** @var  RequestSpecialistsRepository */
    private $requestSpecialistsRepository;

    public function __construct(RequestSpecialistsRepository $requestSpecialistsRepo)
    {
        $this->requestSpecialistsRepository = $requestSpecialistsRepo;
    }

    /**
     * Display a listing of the RequestSpecialists.
     * GET|HEAD /requestSpecialists
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return $this->requestSpecialistsRepository
            ->WhereWithPaginate('status', 1, 2, ['specialties.medical', 'user', 'acceptRequest.doctor.employ']);
    }

    /**
     * Store a newly created RequestSpecialists in storage.
     * POST /requestSpecialists
     *
     *  * @param CreateRequestSpecialistsAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $requestSpecialistsModle = new  RequestSpecialists();
        $requestSpecialistsModle->users_notfication($request->medical_id);

        $requestSpecialists = $this->requestSpecialistsRepository->createApi($input);

        return $this->sendResponse($requestSpecialists->toArray(), 'Request Specialists saved successfully');
    }

    /**
     * Display the specified RequestSpecialists.
     * GET|HEAD /requestSpecialists/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RequestSpecialists $requestSpecialists */
        $requestSpecialists = $this->requestSpecialistsRepository->findWith($id, ['specialties.medical', 'user', 'acceptRequest.doctor.employ.specialty']);

        if (empty($requestSpecialists)) {
            return $this->sendError('Request Specialists not found');
        }

        return $this->sendResponse($requestSpecialists->toArray(), 'Request Specialists retrieved successfully');
    }

    /**
     * Update the specified RequestSpecialists in storage.
     * PUT/PATCH /requestSpecialists/{id}
     *
     * @param int $id
     * @param UpdateRequestSpecialistsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestSpecialistsAPIRequest $request)
    {
        $input = $request->all();

        /** @var RequestSpecialists $requestSpecialists */
        $requestSpecialists = $this->requestSpecialistsRepository->find($id);

        if (empty($requestSpecialists)) {
            return $this->sendError('Request Specialists not found');
        }

        $requestSpecialists = $this->requestSpecialistsRepository->update($input, $id);

        return $this->sendResponse($requestSpecialists->toArray(), 'RequestSpecialists updated successfully');
    }

    /**
     * Remove the specified RequestSpecialists from storage.
     * DELETE /requestSpecialists/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RequestSpecialists $requestSpecialists */
        $requestSpecialists = $this->requestSpecialistsRepository->find($id);

        if (empty($requestSpecialists)) {
            return $this->sendError('Request Specialists not found');
        }

        $requestSpecialists->delete();

        return $this->sendSuccess('Request Specialists deleted successfully');
    }

    public function adminHistory()
    {
        $user = auth('api')->user();
        return $this->requestSpecialistsRepository->wherePaginate('user_id', $user->id, 10);
    }

    public function doctorHistory()
    {
        $user = auth('api')->user();
        return $this->requestSpecialistsRepository->wherePaginate('doctor_id', $user->id, 10);
    }

    /**
     * @param $search
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function search($search)
    {
        return RequestSpecialists::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->orWhereHas('specialties', function ($query) use ($search) {
                return $query->where('name', 'LIKE', "%$search%");
            })->where('status', '=', 1)
            ->get();
    }
}
