<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserModel;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    //
    public function form_them(){
        return view('user.form_them');
    }
    public function XuLyThemUser(Request $request){
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'username' => 'required',
            'password' => 'required',
        ]); 
        // 1. co nghia la neu co bat ki truong nao ko thoa man, thi no tra lai link gui truoc do
       // 2. no se tra ve link do 1 model du lieu mang la errors

        
        $user = [
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'username'=>$request->get('username'),
        ];
        
       
        $user_model = new UserModel();
        $user_model->Them($user);
        return redirect('/sanpham');
    }
}
