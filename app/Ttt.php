<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;

class Ttt extends Model
{
    //

    public function country(){
        return $this->hasOne('App\Country');
    }
}
