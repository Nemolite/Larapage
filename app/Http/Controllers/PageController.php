<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $rules = [
                'regname'=>'required',
                'regphone'=>'required|integer',
                'regemail'=>'required|email',
                'pwd1' => 'same:pwd2'
            ];

            $this->validate($request,$rules); //данные и сообщение об ошибки в сесси

            dump($request->all());

        }
        return view('registr');
    }

    public function admin()
    {
        return view('panel');
    }
}
