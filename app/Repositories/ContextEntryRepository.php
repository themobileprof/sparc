<?php

namespace App\Repositories;

use App\Models\ContextEntry;
use App\Repositories\BaseRepository;

/**
 * Class ContextEntryRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:18 am UTC
*/

class ContextEntryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'context_id',
        'year',
        'content'
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
        return ContextEntry::class;
    }
}
