<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\BaseRepository;

/**
 * Class CategoriaRepository
 * @package App\Repositories
 * @version March 21, 2019, 1:52 am UTC
*/

class CategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_categoria',
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
        return Categoria::class;
    }
}
