<?php
/**
 * Ulogin.ru auto registration or login.
 */
namespace App\Http\Controllers;

use App\fulluser;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use Illuminate\Support\Facades\DB;

class UloginController extends Controller
{

// Login user through social network.
    public function login(Request $request)
    {
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);


        $user = json_decode($data, TRUE);
        dump($user);
        //exit;

        $userData = fulluser::where('email', $user['email'])->first();

        if (isset($userData->id)) {
            return redirect()->route('admin');
        } else {

            $network = $user['network'];

            if ("vkontakte" === $network) {
                return view('add', ['user' => $user]);
            }

            return redirect()->route('admin');
        }

    }
    public function regsoc(Request $request) // valid and regist
    {
        if($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'regname'=>'required|string|unique:fullusers,login',
                'regphone'=>'required|integer|unique:fullusers,phone',
                'regemail'=>'required|email|unique:fullusers,email',

            ];
            $validator = Validator::make($request->all(),$rules,$messages);

            $this->validate($request,$rules); //

            if ($validator->fails()) {// if errors

                return redirect('/regsoc')
                    ->withErrors($validator)
                    ->withInput();
            }

            $login = $request->input('regname');
            $pass = Hash::make(str_random(8));
            $phone = $request->input('regphone');
            $email = $request->input('regemail');

            DB::insert("INSERT INTO `fullusers` (`login`,`pass`,`phone`,`email`) 
                                               VALUES (?,?,?,?)",[$login,$pass,$phone,$email]);
            return redirect('/admin');

        }
        return view('regsoc');

    }
}