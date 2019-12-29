<?php

namespace App\Repositories;

use App\Models\Pengumuman;
use App\Repositories\BaseRepository;

/**
 * Class PengumumanRepository
 * @package App\Repositories
 * @version December 25, 2019, 6:25 pm WIB
*/

class PengumumanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'isi',
        'tanggal'
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
        return Pengumuman::class;
    }
}
