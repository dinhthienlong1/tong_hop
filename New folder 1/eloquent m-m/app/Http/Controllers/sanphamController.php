<?php

namespace App\Http\Controllers;
use App\sanpham;
use Illuminate\Http\Request;

class sanphamController extends Controller
{
    public function index(){
        $sanpham= sanpham::paginate(3);
        return view('sanpham.index',[
            'sanpham'=>$sanpham
        ]);
    }
}
