<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class BasaController extends Controller
{
    //
    protected static $pages;

    public function addPages($array){
        return self::$pages[]=$array;
    }

    public function showbasa(){
        if (view()->exists('database.database')){
            $page = DB::select("SELECT * FROM `pages`");
            return view('database.database')->withPage($page[0])->withTitle('About our company');
        }
    }

    public  function showdb(){
//        $page = DB::table('pages')->get();
//        $page = DB::table('pages')->value('name');
//        $page = DB::table('pages')->chunk(2,function($page){
//            foreach($page as $pag){
//                BasaController::addPages($pag);
//            }
//        });
//        dump($page);
//        $page = DB::table('pages')->count();
//        $page = DB::table('pages')->select('name')->get();//данный метод возвращает объект Bilder
//        $what = DB::table('pages')->insert(
//            ['name' => 'New name', 'text' => 'new txt', 'alias'=>'alias best']
//        );

//        $query = DB::table('pages')->select('name');
//        $page = $query->addSelect('text', 'alias')->get();
        $page = DB::table('pages')->select()->where('id','>',2)->get();
        
        dump($page);
//        dump(self::$pages);
    }
}
