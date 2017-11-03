<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ // список разрешенных к изменению имен полей
        'login', 'pass', 'phone','email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ //скрытые поля
        'pass',
    ];

    public function country(){
        return $this->hasOne('App\Country');
    }

}
