<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use App\fulluser;
use Illuminate\Support\Facades\Hash;




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
                'regname'=>'required|string|unique:fullusers,login',
                'regphone'=>'required|integer|unique:fullusers,phone',
                'regemail'=>'required|email|unique:fullusers,email',
                'pwd1' => 'same:pwd2|min:5'
            ];
            $validator = Validator::make($request->all(),$rules,$messages);

            $this->validate($request,$rules); //

            if ($validator->fails()) {// if errors

                return redirect('/regist')
                    ->withErrors($validator)
                    ->withInput();
            }

           // dump($request->all());

            $login = $request->input('regname');
            $pass = $request->input('pwd1');
            $phone = $request->input('regphone');
            $email = $request->input('regemail');

            DB::insert("INSERT INTO `fullusers` (`login`,`pass`,`phone`,`email`) 
                                               VALUES (?,?,?,?)",[$login,$pass,$phone,$email]);
            return redirect('/');


        }
        return view('registr');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Отображение админпанели
     */
    public function admin()
    {

        $users = fulluser::all();
        //dump($users);

        return view('panel')->with('users', $users);
    }

    /**
     * Регистация через ВКонтакте
     */
    public function regvk()
    {
         $users = DB::select("SELECT * FROM `fullusers`");

         //dump($users);
        // return view('panel');
    }

    public function authuser(Request $request) //аутиндификация
    {
        $login = $request->input('login');
        $pass = $request->input('password');
        $comare = DB::table('fullusers')
            ->where('login', '=', $login)
            ->where('pass', '=', $pass)
            ->get();
        if (!empty($comare)) {
            // Аутентификация успешна
            echo "yes";
            return redirect('/admin');
        } else {
            echo "no";
        }
    }
}
