<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fulluser extends Model
{
    protected $table = 'fullusers';

    protected $fillable = [
        'login', 'pass', 'phone','email',
    ];
    //
}
