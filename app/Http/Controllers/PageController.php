<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

//use App\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('start');
    }

    public function registshow(Request $request)
    {

        if($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'regname'=>'required',
                'regphone'=>'required|integer',
                'regemail'=>'required|email',
                'pwd1' => 'same:pwd2'
            ];
            $validator = Validator::make($request->all(),$rules,$messages);

            $this->validate($request,$rules); //данные и сообщение об ошибки в сесси

            if ($validator->fails()) {// если были ошибки
                return redirect()->route('regist')->withErrors($validator)->withInput();
            }

         //   dump($request->all());

        }
        return view('registr');
    }

    public function admin()
    {
        return view('panel');
    }
}
