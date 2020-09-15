<?php

namespace App\Http\Controllers;

use App\SanPhamModel;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    
    public function ChiTiet(Request $request, $id){
        $SanPhamModel = new SanPhamModel();
        $sanpham =  $SanPhamModel->LayBangId($id);

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        
        if (is_null($sanpham)){
            return redirect('sanpham');
        }


        return view('sanpham.ChiTiet', [
            'sanpham'=>$sanpham
        ]);
    }
    public function index(Request $request){
        $SanPhamModel = new SanPhamModel();
        $dssp =  $SanPhamModel->LayDanhSachOTrangChu(5);

        return view('sanpham.index', [
            'dssp'=>$dssp
        ]);
        
    }

    public function XuLy_timkiem(Request $request){
        
       
        $user_model = new SanPhamModel();
        $tu_khoa = $request->get('tu_khoa');
       $dssp= $user_model->TimKiem($tu_khoa);
       
        return view('sanpham.index',[
            'dssp'=>$dssp
        ]);
    }
   

}
