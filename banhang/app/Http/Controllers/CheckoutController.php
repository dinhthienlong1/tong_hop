<?php

namespace App\Http\Controllers;

use App\CheckoutModel;
use App\DonHangModel;
use App\GioHangModel;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function Index(Request $request){
        $GioHangModel  = new GioHangModel($request);
        $giohang = $GioHangModel->LayGioHang();
        if( empty($giohang['dssp']) ){
            return redirect('/GioHang');
        }
        $viewModel = [
            'giohang'=>$giohang,
        ];
        return view('Checkout/Index',$viewModel);
    }

    //post
    public function Checkout(Request $request){
        $donhang = [
            'ho_va_ten'=>$request->get('ho_va_ten'),
            'sdt'=>$request->get('sdt'),
            'dia_chi_giao_hang'=>$request->get('dia_chi_giao_hang'),
            'ghi_chu'=>$request->get('ghi_chu'),
        ];
        $CheckoutModel = new CheckoutModel();
        $GioHangModel =  new GioHangModel($request);
        $giohang = $GioHangModel->LayGioHang();
        
        $id_donhang = $CheckoutModel->TaoDonHang($donhang,  $giohang);
        if($id_donhang == 0){
            return redirect()->back()->withErrors(['Loi khong the tao don hang']);
        }
        $request->session()->put('id_donhang', $id_donhang);
        return redirect('/Checkout/ThankYou/'.$id_donhang);
    }
      
    public function ThankYou(Request $request, $id_donhang){
        if(!$request->session()->has('id_donhang') || $request->session()->get('id_donhang') != $id_donhang){
            die('khong hop le');
        }
       
        $DonHangModel = new DonHangModel();
        $donhang =  $DonHangModel->LayDonHang($id_donhang);
        
     
        $viewModel = [
            'donhang'=> $donhang
        ];

        //xoa gio hang
        return view('Checkout/ThankYou', $viewModel );
    }
}
