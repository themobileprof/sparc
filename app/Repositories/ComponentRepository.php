<?php

namespace App\Repositories;

use App\Models\Component;
use App\Repositories\BaseRepository;

/**
 * Class ComponentRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:22 am UTC
*/

class ComponentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'component',
        'headerEnglish',
        'headerFrench'
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
        return Component::class;
    }
}
