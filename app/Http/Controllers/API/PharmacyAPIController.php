<?php

namespace App\Http\Controllers\API;

use App\FcmHelper;
use App\Http\Requests\API\CreatePharmacyAPIRequest;
use App\Http\Requests\API\UpdatePharmacyAPIRequest;
use App\Models\Pharmacy;
use App\Models\Wallet;
use App\Repositories\PharmacyRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Response;

/**
 * Class PharmacyController
 * @package App\Http\Controllers\API
 */
class PharmacyAPIController extends AppBaseController
{
    /** @var  PharmacyRepository */
    private $pharmacyRepository;

    public function __construct(PharmacyRepository $pharmacyRepo)
    {
        $this->pharmacyRepository = $pharmacyRepo;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @SWG\Get(
     *      path="/pharmacies",
     *      summary="Get a listing of the Pharmacies.",
     *      tags={"Pharmacy"},
     *      description="Get all Pharmacies",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Pharmacy")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
        return $this->pharmacyRepository->withPaginate(10, ['user']);
    }

    /**
     * @param CreatePharmacyAPIRequest $request
     * @return bool
     *
     * @SWG\Post(
     *      path="/pharmacies",
     *      summary="Store a newly created Pharmacy in storage",
     *      tags={"Pharmacy"},
     *      description="Store Pharmacy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pharmacy that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pharmacy")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pharmacy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePharmacyAPIRequest $request)
    {
        $user = auth('api')->user();
        if ($user) {
            $input = $request->all();
            $wallet = Wallet::whereUserId($user->id);
            $wallet->balance = ($wallet->balance - env('AMBULANCE_POINT'));
            $wallet->save();
            $pharmacy = $this->pharmacyRepository->createApi($input);

            return $this->sendResponse($pharmacy->toArray(), 'Pharmacy saved successfully');
        }
        return false;
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pharmacies/{id}",
     *      summary="Display the specified Pharmacy",
     *      tags={"Pharmacy"},
     *      description="Get Pharmacy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pharmacy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pharmacy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }

        return $this->sendResponse($pharmacy->toArray(), 'Pharmacy retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePharmacyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pharmacies/{id}",
     *      summary="Update the specified Pharmacy in storage",
     *      tags={"Pharmacy"},
     *      description="Update Pharmacy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pharmacy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Pharmacy that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Pharmacy")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Pharmacy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePharmacyAPIRequest $request)
    {

        $pharmacyUser = auth('api')->user();
        $request->merge(['pharmacy_id' => $pharmacyUser->id]);
        $input = $request->all();

        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }
        $pharmacy = $this->pharmacyRepository->update($input, $id);
        $user = User::find($pharmacy->user->id);
        $this->fcm_send($user->fcm_registration_id);
        $wallet = Wallet::whereUserId($pharmacyUser->id);
        $wallet->balance = ($wallet->balance - env('AMBULANCE_POINT'));
        $wallet->save();
        return $this->sendResponse($pharmacy->toArray(), 'Pharmacy updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @throws \Exception
     * @SWG\Delete(
     *      path="/pharmacies/{id}",
     *      summary="Remove the specified Pharmacy from storage",
     *      tags={"Pharmacy"},
     *      description="Delete Pharmacy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Pharmacy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Pharmacy $pharmacy */
        $pharmacy = $this->pharmacyRepository->find($id);

        if (empty($pharmacy)) {
            return $this->sendError('Pharmacy not found');
        }

        $pharmacy->delete();

        return $this->sendSuccess('Pharmacy deleted successfully');
    }

    private function fcm_send($fcm_registration_id)
    {
        $title = 'new message';
        $message = 'open Pharmacy Page';
        $result = new FcmHelper();
        return $result->send_android_fcm($fcm_registration_id, $title, $message);
    }
}
