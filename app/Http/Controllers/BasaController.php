<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ttt;
use App\Http\Requests;

class BasaController extends Controller
{

    public function showdb(){
      $result = Ttt::all();
        foreach($result as $t){
           echo $t->user->name;
        }
        dump($result);
        return;
    }
}
