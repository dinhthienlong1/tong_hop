<?php

namespace App\Http\Controllers;

use App\danhmuc;
use Illuminate\Http\Request;

class danhmucController extends Controller
{
    public function danhmuc(){
        $danhmuc= danhmuc::paginate(5);
        return view('danhmuc.index',[
            'danhmuc'=>$danhmuc
        ]);
    }
    public function danhmuc_id($id){
        $danhmuc= danhmuc::find($id);
        return view('danhmuc.sanpham_dm',[
            'danhmuc'=>$danhmuc
        ]);
    }
}
