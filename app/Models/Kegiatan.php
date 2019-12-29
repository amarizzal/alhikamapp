<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kegiatan
 * @package App\Models
 * @version December 18, 2019, 12:03 pm WIB
 *
 * @property string name
 * @property string harga_denda
 */
class Kegiatan extends Model
{
//    use SoftDeletes;

    public $table = 'kegiatans';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'harga_denda'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'harga_denda' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'harga_denda' => 'required'
    ];
}
