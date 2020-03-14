<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 */
class MedicalField extends Model
{
    use SoftDeletes;

    public $table = 'medical_fields';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required min:3'
    ];

    public function medical()
    {
        return $this->hasMany(MedicalSpecialty::class, 'medical_id');
    }

}
