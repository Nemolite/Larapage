<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
   public function show(Request $request, $id=FALSE){

       if ($request->isMethod('post')){
           $rules = [
             'name'=>'reguired|max:10'
           ];
           $this->validate($request,$rules);
           dump($request->all());
       }

       return view('vald.form',['title'=>'vald']);
   }
}
