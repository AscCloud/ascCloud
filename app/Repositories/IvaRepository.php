<?php

namespace App\Repositories;

use App\Models\Iva;
use App\Repositories\BaseRepository;

/**
 * Class IvaRepository
 * @package App\Repositories
 * @version March 26, 2019, 11:45 am UTC
*/

class IvaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'iva'
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
        return Iva::class;
    }
}
