<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version December 18, 2019, 8:24 am WIB
 *
 * @property string username
 * @property string password
 * @property integer role_id
 */
class User extends Authenticatable
{
    use Notifiable;
//    use SoftDeletes;

    public $table = 'users';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'username',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'password' => 'required',
        'role_id' => 'required'
    ];

    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function santri() {
        return $this->hasOne(Santri::class, 'nik', 'username');
    }

    public function denda() {
        return $this->hasOne(Denda::class, 'nik', 'username');
    }
}
