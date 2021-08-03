<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Context
 * @package App\Models
 * @version July 28, 2021, 12:11 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contextEntries
 * @property string $slug
 * @property string $english
 * @property string $french
 */
class Context extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contexts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'slug',
        'english',
        'french'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'slug' => 'string',
        'english' => 'string',
        'french' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'slug' => 'nullable|string|max:100',
        'english' => 'nullable|string|max:100',
        'french' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

	/**
     * Set the Context's SLug.
     *
     * @param  string  $slug
     * @return void
     */
	public function setSlugAttribute($slug)
	{
		$this->attributes['slug'] = str_replace(" ","_",strtolower($slug));
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contextEntries()
    {
        return $this->hasMany(\App\Models\ContextEntry::class, 'context_id');
    }
}
