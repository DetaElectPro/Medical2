<?php

namespace App\Models;

use App\FcmHelper;
use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AcceptRequestSpecialists
 *
 * @package App\Models
 * @version February 19, 2020, 5:27 pm UTC
 * @property \App\User
 * @property RequestSpecialists request
 * @property string note
 * @property string recommendation
 * @property number rating
 * @property integer doctor_id
 * @property integer request_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $doctor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists newQuery()
 * @method static \Illuminate\Database\Query\Builder|AcceptRequestSpecialists onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcceptRequestSpecialists whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AcceptRequestSpecialists withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AcceptRequestSpecialists withoutTrashed()
 * @mixin \Eloquent
 */
class AcceptRequestSpecialists extends Model
{
    use SoftDeletes;

    public $table = 'accept_request_specialists';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'note',
        'recommendation',
        'rating',
        'doctor_id',
        'request_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'note' => 'string',
        'recommendation' => 'string',
        'doctor_id' => 'integer',
        'request_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'note' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function doctor()
    {
        return $this->belongsTo(\App\User::class, 'doctor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function request()
    {
        return $this->belongsTo(RequestSpecialists::class, 'request_id', 'id');
    }


    public function acceptRequest($request, $user)
    {
        $fcm = new FcmHelper();
        $accept = new AcceptRequestSpecialists($request->all());
        $accept->user_id = $user->id;
        $accept = $accept->save();
        $requestUpdate = RequestSpecialists::whereId($request->request_id)->update(['status' => 3]);
        $fcmData = [
            'title' => "Request update",
            "message" => "You have received new message from" . $user->name,
            'fcm_registration_id' => $user->fcm_registration_id];
        $fcm = $fcm->send_android_fcm(fcm_registration_id);
        $data = [$accept, $requestUpdate, $fcmData, $fcm];

        return $data;


    }


    /*
     * @param status
     * have value from 1to 6
     * where 1 = new request by admin
     * and 2 accept by user
     * and 3 accept user by admin
     * and 4 cancel request by admin
     * and 5 cancel request by user
     * and 6 is accept request that is don
     * */


    public function acceptRequestByUser($requestId, $doctor_id)
    {
        $requestSpecialistData = RequestSpecialists::where('id', $requestId)
            ->where('status', 1)
            ->with('user')->first();

        if (!empty($requestSpecialistData)) {
            $acceptRequest = new AcceptRequestSpecialists();
            $acceptRequest->doctor_id = $doctor_id;
            $acceptRequest->request_id = $requestId;
            $acceptRequest = $acceptRequest->save();
            $requestSpecialistData->status = 2;
            $requestSpecialistData->doctor_id = $doctor_id;
            $requestSpecialistData = $requestSpecialistData->save();
//            $fcm = $this->fcm_send($requestSpecialistData->user->fcm_registration_id, "new message 1", "Your Request has accept By a Doctor: " . $requestSpecialistData->user->name)
            return ['accept' => true, 'request' => true, 'acceptRequest' => $requestSpecialistData];
        } else {
            return ['accept' => false, 'request' => false];
        }
    }

    public function acceptRequestByAdmin($requestId, $userId)
    {

        $resultData = RequestSpecialists::whereId($requestId)
            ->whereStatus(2)
            ->with('user')
            ->first();
        $result = RequestSpecialists::whereId($requestId)
            ->where('user_id', $userId)
            ->whereStatus(2)
            ->update(['status' => 3]);
        if ($result == 1) {
            $this->fcm_send($resultData->user->fcm_registration_id, "new message 2", "The admin:" . $resultData->user->name . " approved your request. ");
            return ['accept' => true, 'request' => true];
        } else {
            return ['accept' => false, 'request' => false, 'message' => $result];
        }

    }


    /**
     * @param $requestId
     * @return AcceptRequestSpecialists|array|bool|Builder|mixed|null
     * @throws \Exception
     */
    public function cancelRequestByAdmin($requestId, $userId)
    {
        $acceptRequest = AcceptRequestSpecialists::where('id', $requestId)
            ->where('user_id', $userId)
            ->with('user')->first();
        $acceptRequest = $acceptRequest->delete();
        if ($acceptRequest) {
            $requestSpecialist = RequestSpecialists::whereId($requestId)->update(['status' => 4]);

            $this->fcm_send($acceptRequest->user->fcm_registration_id, "You have received new message ", 'your last Request is Cancel by admin');
//
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    /**
     * @param $requestId
     * @return array
     * @throws Exception
     */
    public function cancelRequestByUser($requestId)
    {
        $acceptRequest = AcceptRequestSpecialists::whereRequestId($requestId);
        $acceptRequest = $acceptRequest->delete();
        if ($acceptRequest) {
            RequestSpecialists::whereId($requestId)->whereStatus(2)->update(['status' => 1]);
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    public function acceptRequestAndDone($requestId, $request, $userId)
    {
        $acceptRequest = AcceptRequestSpecialists::whereRequestId($requestId)
            ->update([
                'note' => $request->note,
                'recommendation' => $request->recommendation,
                'rating' => $request->rating
            ]);
        if ($acceptRequest) {
            $requestSpecialist = RequestSpecialists::whereId($requestId)->whereStatus(3)->update(['status' => 6]);
            return ['accept' => true, 'request' => true];

        } else {
            return ['accept' => false, 'request' => false];
        }

    }

    public function users_notfication($medical_id)
    {
        $medical = MedicalSpecialty::where('id', $medical_id)->first('name');
        $message = 'New Request';
        $title = "$medical->name required";
        $fcm_registration_id = array();
        $fcm_registration = User::all('fcm_registration_id');
        foreach ($fcm_registration as $device) {
            $fcm_registration_id[] = $device->fcm_registration_id;
        }
        $result = new FcmHelper();
        return $result->send_android_fcm_all($fcm_registration_id, $title, $message);
    }

    private function fcm_send($fcm_registration_id, $title, $message)
    {
        $result = new FcmHelper();
        return $result->send_android_fcm($fcm_registration_id, $title, $message);
    }

}

