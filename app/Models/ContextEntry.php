<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ContextEntry
 * @package App\Models
 * @version July 28, 2021, 12:18 am UTC
 *
 * @property \App\Models\Context $context
 * @property \App\Models\Country $country
 * @property integer $country_id
 * @property integer $context_id
 * @property string $year
 * @property string $content
 */
class ContextEntry extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'context_entries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
        'context_id',
        'year',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'context_id' => 'integer',
        'year' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'nullable|integer',
        'context_id' => 'nullable|integer',
        'year' => 'nullable|string|max:100',
        'content' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function context()
    {
        return $this->belongsTo(\App\Models\Context::class, 'context_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }
}
