<?php

namespace App\Http\Controllers;

use App\GioHangModel;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function Index(Request $request){
     
        $GioHangModel = new GioHangModel($request);
        // $GioHangModel->TinhTongTien();
        $giohang = $GioHangModel->LayGioHang();
        return view('GioHang.Index',[
            'giohang'=> $giohang
        ]);
    }
    
    public function AddToCart(Request $request, $id){
        
        //khoi tao model gio hang nap vao request
        $GioHangModel = new GioHangModel($request);
        
        //lay so luong tu form
        $soluong = $request->get('soluong');

        //goi ham model san pham vao gio hang
        $GioHangModel->ThemVaoGioHang($id, $soluong);


        // di den trang gio hang
        return redirect('/GioHang');
       
    }

    public function Xoa(Request $request, $id){
        //khoi tao model gio hang nap vao request
        $GioHangModel = new GioHangModel($request);
        $GioHangModel->Xoa($id);
        // di den trang gio hang
        return redirect('/GioHang');
    }
}
