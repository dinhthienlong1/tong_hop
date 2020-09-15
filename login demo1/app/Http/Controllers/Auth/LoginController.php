<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Getlogin()
    {
        return view('auth.login');
    }

    public function Postlogin(request $request)
    {
        $ruler = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $messager = [
            "email.required" => 'email khong duoc bo trong',
            "email.email" => 'email khong dung dinh dang',
            "password.required" => 'password khong duoc bo trong',
            "password.min" => 'password khong duoc duoi 8 ky tu',
        ];
        $validator = Validator::make($request->all(), $ruler, $messager);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            // var_dump($email,$password);
            // exit;

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                dd('dang nhap thanh cong');
            } else {
                dd('dang nhap that bai');
            }
        }
    }

}
