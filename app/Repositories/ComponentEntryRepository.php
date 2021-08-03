<?php

namespace App\Repositories;

use App\Models\ComponentEntry;
use App\Repositories\BaseRepository;

/**
 * Class ComponentEntryRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:23 am UTC
*/

class ComponentEntryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'content',
        'component_id'
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
        return ComponentEntry::class;
    }
}
