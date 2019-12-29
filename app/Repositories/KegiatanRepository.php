<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use App\Repositories\BaseRepository;

/**
 * Class KegiatanRepository
 * @package App\Repositories
 * @version December 18, 2019, 12:03 pm WIB
*/

class KegiatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'harga_denda'
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
        return Kegiatan::class;
    }
}
