<?php

namespace App\Repositories;

use App\Models\Presensi;
use App\Repositories\BaseRepository;

/**
 * Class PresensiRepository
 * @package App\Repositories
 * @version December 19, 2019, 8:26 am WIB
*/

class PresensiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'tanggal',
        'masuk',
        'keluar',
        'izin',
        'keterangan'
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
        return Presensi::class;
    }
}
