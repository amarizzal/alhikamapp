<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class JadwalKegiatan
 * @package App\Models
 * @version December 18, 2019, 12:04 pm WIB
 *
 * @property string tanggal
 * @property integer kegiatan_id
 */
class JadwalKegiatan extends Model
{
//    use SoftDeletes;

    public $table = 'jadwal_kegiatans';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        'kegiatan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tanggal' => 'string',
        'kegiatan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tanggal' => 'required',
        'kegiatan_id' => 'required'
    ];

    public function kegiatan() {
        return $this->hasOne(Kegiatan::class, 'id', 'kegiatan_id');
    }
}
