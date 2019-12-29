<?php

namespace App\Repositories;

use App\Models\JadwalKegiatan;
use App\Repositories\BaseRepository;

/**
 * Class JadwalKegiatanRepository
 * @package App\Repositories
 * @version December 18, 2019, 12:04 pm WIB
*/

class JadwalKegiatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal',
        'kegiatan_id'
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
        return JadwalKegiatan::class;
    }
}
