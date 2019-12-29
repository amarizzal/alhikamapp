<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DendaDetail
 * @package App\Models
 * @version December 19, 2019, 10:14 am WIB
 *
 * @property string tgl
 * @property string denda
 * @property integer denda_id
 * @property boolean status
 */
class DendaDetail extends Model
{
//    use SoftDeletes;

    public $table = 'denda_details';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tgl',
        'denda',
        'denda_id',
        'keterangan',
        'jadwalkegiatan_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tgl' => 'date',
        'denda' => 'string',
        'denda_id' => 'integer',
        'keterangan' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tgl' => 'required',
        'denda' => 'required',
        'denda_id' => 'required',
        'status' => 'required',
        'keterangan' => 'required',
    ];

    public function jadwalKegiatan() {
        return $this->hasOne(JadwalKegiatan::class, 'id', 'jadwalkegiatan_id');
    }
}
