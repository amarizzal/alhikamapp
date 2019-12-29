<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Denda
 * @package App\Models
 * @version December 19, 2019, 10:10 am WIB
 *
 * @property string nik
 * @property string total_denda
 * @property integer kegiatan_id
 * @property boolean status
 */
class Denda extends Model
{
//    use SoftDeletes;

    public $table = 'dendas';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nik',
        'total_denda',
        'kegiatan_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'string',
        'total_denda' => 'string',
        'kegiatan_id' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required',
        'total_denda' => 'required',
        'kegiatan_id' => 'required',
        'status' => 'required'
    ];

    public function denda_detail() {
        return $this->hasMany(DendaDetail::class, 'denda_id', 'id');
    }

    public function last_denda_detail() {
        return $this->hasOne(DendaDetail::class, 'denda_id', 'id')->latest();
    }

    public function santri() {
        return $this->hasOne(Santri::class, 'nik', 'nik');
    }

    public function presensi() {
        return $this->hasMany(Presensi::class, 'nik','nik');
    }

}
