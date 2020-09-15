<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function Getlogin()
    {
        return view('index');
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
