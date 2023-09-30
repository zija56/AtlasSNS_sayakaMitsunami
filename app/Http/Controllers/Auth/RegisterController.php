<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){


        if($request->isMethod('post')){
            // バリデーションの追加

            // dd($request);
            $request -> validate([
             'username' => 'required | min:2 | max:12',
             'mail' => 'required | min:5 | max:40 | email | unique:users,mail',
             'password' => 'required | min:8 | max:20 | alpha-num | confirmed:password',
             'password_confirmation' => 'required | min:8 | max:20 | alpha-num',
            ]);



            // 値を送る
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            // DBに登録する(idを新たに作る)
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            $request -> session() -> put('username', $username);
            return redirect('added')->with($username);
        }

        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
