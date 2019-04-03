<?php

namespace App\Repositories;

use App\Models\Planta;
use App\Repositories\BaseRepository;

/**
 * Class PlantaRepository
 * @package App\Repositories
 * @version April 2, 2019, 9:54 am -05
*/

class PlantaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_planta',
        'descuento_planta',
        'sucursal_id'
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
        return Planta::class;
    }
}
