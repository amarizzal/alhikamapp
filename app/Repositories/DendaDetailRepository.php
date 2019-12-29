<?php

namespace App\Repositories;

use App\Models\DendaDetail;
use App\Repositories\BaseRepository;

/**
 * Class DendaDetailRepository
 * @package App\Repositories
 * @version December 19, 2019, 10:14 am WIB
*/

class DendaDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tgl',
        'denda',
        'denda_id',
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
        return DendaDetail::class;
    }
}
