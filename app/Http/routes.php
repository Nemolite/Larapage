<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*old in the folider "other "*/
Route::get('/', ['as'=>'login','uses'=>'PageController@index']);
Route::post('/', ['as'=>'logindata','uses'=>'PageController@authuser']);

Route::get('/admin', ['as'=>'admin','uses'=>'PageController@admin']); //   admin panel
Route::post('/admin/search', ['as'=>'search','uses'=>'PageController@search']); //   poisk

Route::get('/regist', ['as'=>'regist','uses'=>'PageController@registshow']);
Route::post('/regist', ['uses'=>'PageController@registshow']);


Route::post('ulogin', 'UloginController@login');
Route::post('/regsoc', ['as'=>'regsoc','uses'=>'UloginController@regsoc']);


//Route::auth();
//// admin
//Route::group(['middleware'=>['web' ,'auth']],function(){
//
//    Route::get('/admin', ['as'=>'admin','uses'=>'PageController@admin']); //   admin panel
//
//});

Route::get('/test',['uses'=>'Auth\MyAuthController@showLogin']);
Route::post('/test',['uses'=>'Auth\MyAuthController@@auth']);


Route::auth(); //Auth
// code


/*
Route::get('/cont','FirstController@display_user');

Route::get('/adm','FirstController@display_admin');

Route::get('/method','FirstController@display_method');



Route::get('/method/{newid}','FirstController@display_method'); //парамтр будет передаваться в метод

Route::get('/second', 'SecondController@second_show');

Route::get('/three/{param}', ['uses'=>'dir\ThreeController@dir_show','as'=>'three','middleware'=>'mymiddle']);
*/
// list page
//Route::resource('/pages','Admin\CoreResoyrse');


//Route::controller('/pages','PagesController',['getCreate'=>'pages.create']); // единный контролер для обработки запросов
/*
Route::post('/pages',function(){
	echo "/pages";
});
*/
//Route::get('/basa','BasaController@showbasa');
//Route::get('/basa2','BasaController@showdb');
//
//Route::get('/arts',['as'=>'arts','uses'=>'HomeController@index']);
//
//Route::get('/home', 'testController@basaviwe');
//
//Route::get('/about',['as'=>'about','uses'=>'AboutController@show']);
//
//Route::match(['get','post'],'/contactform',['as'=>'contactform','uses'=>'ContController@showform']);
//
//Route::get('/', ['as'=>'home','uses'=>'Admin\IndexController@show']);
//
//Route::get('/rtest','testController@dis');
//Route::get('/atat/{aaa}','sotController@less');
//
//
//Route::get('/welcome', ['as'=>'welcome',function () {
//    return view('welcome');
//}]);
//
//Route::resource('/listb','Log\rController');
//
//Route::match(['get','post'],'/vald',['uses'=>'Admin\ContactController@show','as'=>'vald']);

/*
Route::get('/article/{id}', ['as'=>'article',function ($id) {
    echo $id;
}]);


Route::get('/{id}/{cat}', function($id,$cat){
	echo $id;
	echo $cat;
});


Route::post('/comments', function(){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
});

Route::group(['prefix'=>'admin/{dlina}'],function(){ // группы маршрутов
	Route::get('/create',function(){
		echo route('welcome');
	});
	
	Route::get('page/create',function(){
		return redirect()->route('article',array('id'=>25));
	});
	
	
	Route::get('/home',function(){
		echo route('home');
	});
	
	Route::get('/cur/{lot}',function() {
		$route = Route::current();
		//echo $route->getName();
		//echo $route->getParameter('lot',24);
		print_r($route->parameters());
	})->name('curcur');
	
	
	
	
	
	
	
});


Route::group(['middleware'=>['web']],function() {
	
});
*/