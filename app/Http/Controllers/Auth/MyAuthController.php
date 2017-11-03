<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use  Auth;

class MyAuthController extends Controller
{
    //

    public function showLogin()
    {
        return view('test');
    }

    public function auth(Request $request) // for post
    {
        $array = $request->all();

        $remember = $request->has('remeber');

        $userauth = Auth::attempt([                 // метод аутинифицирует пользователя
            'login'=>$array['login'],   // первый аргумент массив, для поиска (логин)
            'pass'=>$array['pass']
            ], $remember);
            // remeber - for чекбокс
        if ($userauth){
            return redirect()->intended('/admin');// intended - альтернативный путь, если предидущий не был найден
        }

        return redirect()->back()->withInput($request->only('login','remeber'))
            ->withErrors([
            'login'=>'Данные аутиндификации не верны'
            ]); // вернем пользователя назад
        //back() - назад
        //withInput() -  с теми же данными, но пароль не нужно
        // >only('login','remeber') - показываем только логин и чекбокс, а параоль не надо
        // withErrors() - даем ошибки юзеру на прочтение, но предварительно описываем
    }
}
