<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pengumuman
 * @package App\Models
 * @version December 25, 2019, 6:25 pm WIB
 *
 * @property string isi
 * @property string tanggal
 */
class Pengumuman extends Model
{
    use SoftDeletes;

    public $table = 'pengumumen';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'isi',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'isi' => 'string',
        'tanggal' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'isi' => 'required',
        'tanggal' => 'required'
    ];

    
}
