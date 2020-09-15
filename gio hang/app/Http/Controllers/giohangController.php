<?php

namespace App\Http\Controllers;

use App\GiohangModel;
use Illuminate\Http\Request;

class GiohangController extends Controller
{

    public function GioHang(Request $request)
    {
        $giohangModel = new GiohangModel($request);
        $giohang = $giohangModel->laygiohang();
        return view('giohang.index', [
            'giohang' => $giohang
            ]);
            
    }

    public function addtocard(request $request,  $id)
    {
        $giohangModel = new GiohangModel($request);
        $so_luong = $request->get('so_luong');
        $giohangModel->themgiohang($id, $so_luong);
        return redirect('/GioHang');
    }
    public function xoa(request $request,$id){
        $giohangModel=new GiohangModel($request);
        $giohangModel->xoa($id);
        return redirect('/GioHang');
    }
}
