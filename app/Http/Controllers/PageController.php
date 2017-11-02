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
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;




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
        //$users = fulluser::all()->paginate(10);
        $users = DB::table('fullusers')->paginate(5);

        return view('panel', ['users' => $users]);

        //return view('panel')->with('users', $users);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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
           return redirect('/admin');
        }
    }

    public function search(Request $request) //поиск
    {

        $search = $request->input('search');

       // $result = DB::table('fullusers')
        $result = fulluser::where('login', 'like', '%'.$search.'%')
              ->orWhere('phone', 'like', '%'.$search.'%')
              ->orWhere('email', 'like', '%'.$search.'%')
              ->paginate(5);
         //   ->where('login', 'like', '%'.$search.'%')
         //   ->orWhere('phone', 'like', '%'.$search.'%')
         //   ->orWhere('email', 'like', '%'.$search.'%')
         //   ->get()
          //  ->paginate(5);

       // dump($result);

            return view('search')->with('result', $result);

    }
}
