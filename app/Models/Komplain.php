<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Komplain
 * @package App\Models
 * @version December 25, 2019, 6:32 pm WIB
 *
 * @property string isi
 * @property integer santri_id
 * @property boolean status
 */
class Komplain extends Model
{
    use SoftDeletes;

    public $table = 'komplains';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'isi',
        'santri_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'isi' => 'string',
        'santri_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'isi' => 'required',
//        'santri_id' => 'required',
        'status' => 'required'
    ];

    public function santri() {
        return $this->belongsTo(Santri::class, 'santri_id', 'nik');
    }
}
