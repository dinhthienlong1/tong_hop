<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class DangkyController extends Controller
{
    public function form_them(){
        return view('dangky');
    }
    public function XuLyThemUser(Request $request){
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]); 
        // 1. co nghia la neu co bat ki truong nao ko thoa man, thi no tra lai link gui truoc do
       // 2. no se tra ve link do 1 model du lieu mang la errors

        
        $user = [
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password' => Hash::make($request->newPassword),
           
        ];
        
       
        $user_model = new User();
        $user_model->create($user);
        return redirect('/dangky');
    }

    public function demo(){
        $demo=  User::orderBy('id', 'desc')->get();
        return view('danhsach.menu',[
            'demo'=>$demo
        ]);

    }

   
}
