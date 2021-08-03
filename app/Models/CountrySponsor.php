<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CountrySponsor
 * @package App\Models
 * @version August 2, 2021, 1:26 am UTC
 *
 * @property string $country_id
 * @property integer $sponsor_id
 */
class CountrySponsor extends Model
{

    use HasFactory;

    public $table = 'country_sponsor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'country_id',
        'sponsor_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'string',
        'sponsor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required|string|max:3',
        'sponsor_id' => 'required|integer'
    ];

    
}
