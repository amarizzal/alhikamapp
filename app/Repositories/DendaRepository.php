<?php

namespace App\Repositories;

use App\Models\Denda;
use App\Repositories\BaseRepository;

/**
 * Class DendaRepository
 * @package App\Repositories
 * @version December 19, 2019, 10:10 am WIB
*/

class DendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'total_denda',
        'kegiatan_id',
        'status'
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
        return Denda::class;
    }
}
