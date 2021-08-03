<?php

namespace App\Repositories;

use App\Models\PurchasingFunction;
use App\Repositories\BaseRepository;

/**
 * Class PurchasingFunctionRepository
 * @package App\Repositories
 * @version July 28, 2021, 12:31 am UTC
*/

class PurchasingFunctionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return PurchasingFunction::class;
    }
}
