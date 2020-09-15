<?php

namespace App\Http\Controllers;

use App\SanPhamModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //trang chu
    public function Index(){
        $SanPhamModel = new SanPhamModel();
        $dssp = $SanPhamModel->LayDanhSachOTrangChu(8);
        return view('home.index', [
            'dssp'=>$dssp
        ]);
    }
}
