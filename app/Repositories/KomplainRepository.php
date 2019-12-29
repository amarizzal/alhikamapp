<?php

namespace App\Repositories;

use App\Models\Komplain;
use App\Repositories\BaseRepository;

/**
 * Class KomplainRepository
 * @package App\Repositories
 * @version December 25, 2019, 6:32 pm WIB
*/

class KomplainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'isi',
        'santri_id',
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
        return Komplain::class;
    }
}
