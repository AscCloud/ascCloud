<?php

namespace App\Repositories;

use App\Models\Sucursal;
use App\Repositories\BaseRepository;

/**
 * Class SucursalRepository
 * @package App\Repositories
 * @version March 21, 2019, 1:15 am UTC
*/

class SucursalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_sucursal',
        'direccion_sucursal',
        'telefono_sucursal'
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
        return Sucursal::class;
    }
}
