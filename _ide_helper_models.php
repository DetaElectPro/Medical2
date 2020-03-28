<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\FcmHelper
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FcmHelper newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FcmHelper newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FcmHelper query()
 * @mixin \Eloquent
 */
	class FcmHelper extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $fcm_registration_id
 * @property string|null $image
 * @property string $password
 * @property int $active
 * @property string|null $confirmation_code
 * @property int $confirmed
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int $status
 * @property int $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property-read \App\Models\AcceptRequestSpecialists $acceptRequest
 * @property-read \App\Models\Employ $employ
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFcmRegistrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmergencyServiced[] $emergency
 * @property-read int|null $emergency_count
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmergencyServiced
 *
 * @SWG\Definition (
 *      definition="EmergencyServiced",
 *      required={"name", "address", "price_per_day", "type", "contact", "available"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ), @SWG\Property(
 *          property="contact",
 *          description="contact",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price_per_day",
 *          description="price_per_day",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="available",
 *          description="available",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $contact
 * @property float $price_per_day
 * @property string $type
 * @property int $available
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced wherePricePerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmergencyServiced whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmergencyServiced withoutTrashed()
 */
	class EmergencyServiced extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wallet
 *
 * @SWG\Definition (
 *      definition="Wallet",
 *      required={"balance"},
 *      @SWG\Property(
 *          property="balance",
 *          description="balance",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property int $id
 * @property int $balance
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $employ
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Wallet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wallet whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Wallet withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Wallet withoutTrashed()
 */
	class Wallet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ambulance
 *
 * @SWG\Definition (
 *      definition="Ambulance",
 *      required={"title", "longitude", "latitude"},
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="longitude",
 *          description="longitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="latitude",
 *          description="latitude",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),  @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $longitude
 * @property string $latitude
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ambulance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ambulance whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ambulance withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ambulance withoutTrashed()
 */
	class Ambulance extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Employ
 *
 * @package App\Models
 * @version February 19, 2020, 4:55 pm UTC
 * @property \App\User employ
 * @property \App\Models\MedicalField medicalField
 * @property string graduation_date
 * @property string birth_of_date
 * @property string medical_registration_number
 * @property string registration_date
 * @property string address
 * @property integer years_of_experience
 * @property string cv
 * @property integer user_id
 * @property integer medical_fields_id
 * @property int $id
 * @property int $medical_field_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $doctor
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereBirthOfDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereGraduationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereMedicalFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereMedicalRegistrationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employ whereYearsOfExperience($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employ withoutTrashed()
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon $graduation_date
 * @property \Illuminate\Support\Carbon $birth_of_date
 * @property string $medical_registration_number
 * @property \Illuminate\Support\Carbon $registration_date
 * @property string $address
 * @property int $years_of_experience
 * @property string $cv
 * @property int $user_id
 * @property-read \App\Models\MedicalSpecialty $medicalField
 */
	class Employ extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MedicalField
 *
 * @package App\Models
 * @version February 19, 2020, 4:54 pm UTC
 * @property string name
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MedicalField withoutTrashed()
 * @mixin \Eloquent
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MedicalSpecialty[] $medical
 * @property-read int|null $medical_count
 */
	class MedicalField extends \Eloquent {}
}

namespace App\Models{
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
 * @property string|null $note
 * @property string|null $recommendation
 * @property int|null $rating
 * @property int $doctor_id
 * @property int $request_id
 * @property-read \App\Models\RequestSpecialists $request
 */
	class AcceptRequestSpecialists extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RequestSpecialists
 *
 * @package App\Models
 * @version February 19, 2020, 5:59 pm UTC
 * @property \App\User user
 * @property \App\User doctor
 * @property string name
 * @property string address
 * @property string start_time
 * @property string end_time
 * @property double price
 * @property number number_of_hour
 * @property double longitude
 * @property double latitude
 * @property integer user_id
 * @property integer doctor_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists newQuery()
 * @method static \Illuminate\Database\Query\Builder|RequestSpecialists onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereNumberOfHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestSpecialists whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|RequestSpecialists withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RequestSpecialists withoutTrashed()
 * @mixin \Eloquent
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon $end_time
 * @property int $number_of_hour
 * @property float $price
 * @property int $status
 * @property string $longitude
 * @property string $latitude
 * @property int $medical_id
 * @property int $user_id
 * @property int|null $doctor_id
 * @property-read \App\Models\AcceptRequestSpecialists $acceptRequest
 * @property-read \App\User|null $doctor
 * @property-read \App\Models\MedicalSpecialty $specialties
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RequestSpecialists whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RequestSpecialists whereStatus($value)
 */
	class RequestSpecialists extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pharmacy
 *
 * @SWG\Definition (
 *      definition="Pharmacy",
 *      required={"name", "address", "dose", "type"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="company",
 *          description="company",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pharmacy_id",
 *          description="pharmacy_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 * @property-read \App\User $pharmacy
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pharmacy query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Pharmacy withoutTrashed()
 */
	class Pharmacy extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MedicalSpecialty
 *
 * @package App\Models
 * @version February 19, 2020, 4:54 pm UTC
 * @property string name
 * @property integer medical_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty newQuery()
 * @method static \Illuminate\Database\Query\Builder|MedicalSpecialty onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereMedicalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MedicalSpecialty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MedicalSpecialty withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MedicalSpecialty withoutTrashed()
 * @mixin \Eloquent
 * @property string $name
 * @property int $medical_id
 * @property-read \App\Models\MedicalField $medical
 */
	class MedicalSpecialty extends \Eloquent {}
}

