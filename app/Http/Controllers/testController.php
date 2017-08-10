<?php
namespace App\Http\Controllers;
 use DB;

use App\Http\Controllers\Controller;

class testController extends Controller {

	       public  function basaviwe() {
//        DB::insert("INSERT INTO `ttts` (`name`,`airline`) VALUES (?,?)",['testets1','popopopopo']);
        $colt = DB::update("UPDATE `ttts` SET `name` = 'sssss' WHERE id=:id",['id'=>3]);
         echo  $colt;
        $del= DB::delete("DELETE FROM `ttts` WHERE id=:id",['id'=>1]);
          echo  $del;
        $post = DB::select("SELECT * FROM `ttts`");

        dump($post);


    }
	
}
?>