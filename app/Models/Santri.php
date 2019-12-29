<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Santri
 * @package App\Models
 * @version December 18, 2019, 8:21 am WIB
 *
 * @property string nik
 * @property string nama
 * @property string kelamin
 * @property string kategori
 * @property string angkatan
 */
class Santri extends Model
{
//    use SoftDeletes;

    public $table = 'santris';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nik',
        'nama',
        'kelamin',
        'kategori',
        'angkatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'string',
        'nama' => 'string',
        'kelamin' => 'string',
        'kategori' => 'string',
        'angkatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nik' => 'required',
        'nama' => 'required',
        'kelamin' => 'required',
        'kategori' => 'required',
        'angkatan' => 'required'
    ];

    public function users() {
        return $this->hasOne(User::class, 'nik', 'username');
    }
}
