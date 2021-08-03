<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Country
 * @package App\Models
 * @version July 28, 2021, 12:01 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $componentEntries
 * @property \Illuminate\Database\Eloquent\Collection $contextEntries
 * @property \Illuminate\Database\Eloquent\Collection $sponsors
 * @property \Illuminate\Database\Eloquent\Collection $purchasingFunctions
 * @property string $cc
 * @property string $name
 * @property string $language
 * @property string $flag
 * @property string $notes
 * @property string $external_img
 */
class Country extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'countries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cc',
        'name',
        'language',
        'flag',
        'notes',
        'external_img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cc' => 'string',
        'name' => 'string',
        'language' => 'string',
        'flag' => 'string',
        'notes' => 'string',
        'external_img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cc' => 'required|string|max:3',
        'name' => 'nullable|string|max:100',
        'language' => 'nullable|string|max:100',
        'flag' => 'nullable|string|max:100',
        'notes' => 'nullable|string|max:100',
        'external_img' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function componentEntries()
    {
        return $this->hasMany(\App\Models\ComponentEntry::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contextEntries()
    {
        return $this->hasMany(\App\Models\ContextEntry::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function sponsors()
    {
        return $this->belongsToMany(\App\Models\Sponsor::class, 'country_sponsor')->withPivot('id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function purchasingFunctions()
    {
        return $this->hasMany(\App\Models\PurchasingFunction::class, 'country_id');
    }
}
