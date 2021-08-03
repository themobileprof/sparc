<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sponsor
 * @package App\Models
 * @version July 28, 2021, 12:28 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $countries
 * @property string $name
 * @property string $logo
 */
class Sponsor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sponsors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function countries()
    {
        return $this->belongsToMany(\App\Models\Country::class, 'country_sponsor');
    }
}
