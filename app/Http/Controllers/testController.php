<?php
namespace App\Http\Controllers;
 use DB;

use App\Http\Controllers\Controller;

class testController extends Controller {

	       public  function basaviwe() {
                DB::insert("INSERT INTO `ttts` (`name`,`airline`) VALUES (?,?)",['name21','text21']);
                       $conres = DB::connection()->getPdo()->lastInsertId();
                       echo $conres;
                       echo "<br>";
                $colt = DB::update("UPDATE `ttts` SET `name` = 'sssss' WHERE id=:id",['id'=>5]);
                       echo  $colt;
                       echo "<br>";
                $del= DB::delete("DELETE FROM `ttts` WHERE id=:id",['id'=>3]);
                       echo  $del;
                $post = DB::select("SELECT * FROM `ttts`");
                      dump($post);
               // delete

    }
	
}
?>