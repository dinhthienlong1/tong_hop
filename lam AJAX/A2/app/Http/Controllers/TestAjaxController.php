<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoStudent;

class TestAjaxController extends Controller
{
    //
    public function ThemSP(Request $request){
        return view('sp.themsp');
    }
    public function XuLyThem(Request $request){

        //luu vao db
        $student=InfoStudent::create($request->all());
        return response()->json([ //200 goi tin tra ve => ok
            'ket_qua'=>true,
            'data'=>$student,
            'thong_diep' => ' them thanh cong',
            'data_nhan' => $request->all()
        ]);
    }
}
