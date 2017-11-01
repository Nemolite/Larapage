<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;



//use App\Http\Request;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Страница входа
     */
    public function index()
    {
        return view('start');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Регистрация нового пользователя и валидация полей форм
     */
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

            $this->validate($request,$rules); //данные и сообщение об ошибки в сессии

            if ($validator->fails()) {// если были ошибки

                return redirect()->route('regist')->withErrors($validator)->withInput();
            }

            dump($request->all());

            $login = $request->input('regname');
            $pass = $request->input('pwd1');
            $phone = $request->input('regphone');
            $email = $request->input('regemail');

            DB::insert("INSERT INTO `fullusers` (`login`,`pass`,`phone`,`email`) 
                                               VALUES (?,?,?,?)",[$login,$pass,$phone,$email]);


        }
        return view('registr');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Отображение админпанели
     */
    public function admin()
    {
        //$users = DB::select("SELECT * FROM `fullusers`");
        $users = DB::select("SELECT * FROM `fullusers`");
        dump($users);

        return view('panel');
    }

    /**
     * Регистация через ВКонтакте
     */
    public function regvk()
    {
         $users = select("SELECT * FROM `fullusers`");

         dump($users);
        // return view('panel');
    }
}
