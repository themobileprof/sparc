<?php

namespace App\Repositories;

use App\Models\Context;
use App\Repositories\BaseRepository;

/**
 * Class ContextRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:11 am UTC
*/

class ContextRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'english',
        'french'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Context::class;
    }
}
