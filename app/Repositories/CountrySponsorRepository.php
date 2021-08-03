<?php

namespace App\Repositories;

use App\Models\CountrySponsor;
use App\Repositories\BaseRepository;

/**
 * Class CountrySponsorRepository
 * @package App\Repositories
 * @version August 2, 2021, 1:26 am UTC
*/

class CountrySponsorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'sponsor_id'
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
        return CountrySponsor::class;
    }
}
