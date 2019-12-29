<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Presensi
 * @package App\Models
 * @version December 19, 2019, 8:26 am WIB
 *
 * @property string nik
 * @property string tanggal
 * @property string masuk
 * @property string keluar
 * @property boolean izin
 * @property string keterangan
 */
class Presensi extends Model
{
//    use SoftDeletes;

    public $table = 'presensis';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nik',
        'tanggal',
        'masuk',
        'keluar',
        'izin',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'string',
        'tanggal' => 'string',
        'masuk' => 'string',
        'keluar' => 'string',
//        'izin' => 'boolean',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'file' => 'required',
//        'nik' => 'required',
//        'tanggal' => 'required',
//        'masuk' => 'required',
//        'keluar' => 'required',
//        'izin' => 'required',
//        'keterangan' => 'required'
    ];

    public function santri() {
        return $this->hasOne(Santri::class, 'nik', 'nik');
    }

    public function jadwalkegiatan() {
        return $this->hasOne(JadwalKegiatan::class, 'tanggal', 'tanggal');
    }
}
