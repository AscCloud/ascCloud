<?php

namespace App\Repositories;

use App\Models\Mesa;
use App\Repositories\BaseRepository;

/**
 * Class MesaRepository
 * @package App\Repositories
 * @version April 2, 2019, 9:56 am -05
*/

class MesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero',
        'planta_id'
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
        return Mesa::class;
    }
}
