<?php

namespace App\Repositories;

use App\Models\Sponsor;
use App\Repositories\BaseRepository;

/**
 * Class SponsorRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:28 am UTC
*/

class SponsorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'logo'
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
        return Sponsor::class;
    }
}
