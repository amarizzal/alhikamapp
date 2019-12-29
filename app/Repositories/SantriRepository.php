<?php

namespace App\Repositories;

use App\Models\Santri;
use App\Repositories\BaseRepository;

/**
 * Class SantriRepository
 * @package App\Repositories
 * @version December 18, 2019, 8:21 am WIB
*/

class SantriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nama',
        'kelamin',
        'kategori',
        'angkatan'
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
        return Santri::class;
    }
}
