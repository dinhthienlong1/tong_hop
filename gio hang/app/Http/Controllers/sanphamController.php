<?php

namespace App\Http\Controllers;

use App\SanPhamModel;
use Illuminate\Http\Request;

class sanphamController extends Controller {
    public function index() {
        $sanphamModel= new SanPhamModel();
        $dssp= $sanphamModel->layhet(8);
        return view('home.index', [
            'dssp'=>$dssp
        ]);
    }
    public function chitiet($id){
        $sanphamModel= new SanPhamModel();
        $sanpham=$sanphamModel->layid($id);
        
        return view('home.chitiet',[
            'sanpham'=>$sanpham
        ]);
    }
}