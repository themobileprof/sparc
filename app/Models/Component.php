<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Component
 * @package App\Models
 * @version July 28, 2021, 12:22 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $componentEntries
 * @property string $component
 * @property string $headerEnglish
 * @property string $headerFrench
 */
class Component extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'components';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'component',
        'headerEnglish',
        'headerFrench'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'component' => 'string',
        'headerEnglish' => 'string',
        'headerFrench' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'component' => 'nullable|string|max:100',
        'headerEnglish' => 'nullable|string|max:100',
        'headerFrench' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

	/**
     * Set the Component.
     *
     * @param  string  $component
     * @return void
     */
	public function setComponentAttribute($component)
	{
		$this->attributes['component'] = str_replace(" ","_",strtolower($component));
	}


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function componentEntries()
    {
        return $this->hasMany(\App\Models\ComponentEntry::class, 'component_id');
    }
}
