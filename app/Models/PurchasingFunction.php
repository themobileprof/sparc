<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PurchasingFunction
 * @package App\Models
 * @version July 28, 2021, 12:31 am UTC
 *
 * @property \App\Models\Country $country
 * @property integer $country_id
 * @property string $column
 * @property string $financial_mgmt
 * @property string $benefits_spec
 * @property string $contracting
 * @property string $provider_payment
 * @property string $monitoring
 * @property string $notes
 */
class PurchasingFunction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'purchasing_functions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
        'column',
        'financial_mgmt',
        'benefits_spec',
        'contracting',
        'provider_payment',
        'monitoring',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'column' => 'string',
        'financial_mgmt' => 'string',
        'benefits_spec' => 'string',
        'contracting' => 'string',
        'provider_payment' => 'string',
        'monitoring' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'nullable|integer',
        'column' => 'nullable|string|max:100',
        'financial_mgmt' => 'nullable|string|max:100',
        'benefits_spec' => 'nullable|string|max:100',
        'contracting' => 'nullable|string|max:100',
        'provider_payment' => 'nullable|string|max:100',
        'monitoring' => 'nullable|string|max:100',
        'notes' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }
}
