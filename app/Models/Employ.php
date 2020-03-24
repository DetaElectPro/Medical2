<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @property \Illuminate\Support\Carbon $registration_date
 * @property string $address
 * @property int $years_of_experience
 * @property string $cv
 * @property int $user_id
 * @property int $medical_field_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $doctor
 * @property-read \App\Models\MedicalField $medicalField
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
 */
class Employ extends Model
{
    use SoftDeletes;

    public $table = 'employs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'graduation_date',
        'birth_of_date',
        'medical_registration_number',
        'registration_date',
        'address',
        'years_of_experience',
        'cv',
        'medical_field_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'graduation_date' => 'date',
        'birth_of_date' => 'date',
        'medical_registration_number' => 'string',
        'registration_date' => 'date',
        'address' => 'string',
        'years_of_experience' => 'integer',
        'cv' => 'string',
        'user_id' => 'integer',
        'medical_field_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'graduation_date' => 'required',
        'birth_of_date' => 'required',
        'medical_registration_number' => 'required|max:150|min:5',
        'registration_date' => 'required|max:50|min:2',
        'address' => 'required|max:150|min:5',
        'years_of_experience' => 'required|min:1',
        'medical_field_id' => 'required|max:100|min:1'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function medicalField()
    {
        return $this->belongsTo(\App\Models\MedicalField::class, 'medical_field_id', 'id');
    }
}
