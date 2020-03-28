<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 */
class MedicalSpecialty extends Model
{
    use SoftDeletes;

    public $table = 'medical_specialties';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'medical_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'medical_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'requierd|max:100|min|3',
        'medical_id' => 'required|max:100|min:3'
    ];

    public function medical()
    {
        return $this->belongsTo(MedicalField::class, 'medical_id');
    }


}
