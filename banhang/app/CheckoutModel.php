<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CheckoutModel extends Model
{
    //
    public function __construct()
    {
        
    }

    public function TaoDonHang($donhang_form, $giohang){
        $now = new \DateTime(); // tao ra ngay hien tai chua format
        $now_format_db = $now->format('Y-m-d H:m:s'); // datetime trong db
       
        // Start transaction!
        DB::beginTransaction();
        try {
            $id_donhang = DB::table('don_hang')->insertGetId(
            [
                'tong_tien'  => $giohang['tong_tien'],
                'ghi_chu'    => $donhang_form['ghi_chu'],
                'ten_kh'     => $donhang_form['ho_va_ten'],
                'dia_chi_giao_hang'     => $donhang_form['dia_chi_giao_hang'],
                'sdt'        => $donhang_form['sdt'],
                'ngay_tao'   => $now_format_db,
            ]
            );
            //them chi tiet don hang lay tu gio hang
            $ct_don_hang = [];
            foreach($giohang['dssp'] as $sp){
                $ct_don_hang[] = [
                    'id_don_hang' => $id_donhang,
                    'id_sp' => $sp['id_san_pham'],
                    'sl' => $sp['soluong'],
                    'gia' => $sp['gia'],
                    'thanh_tien' => $sp['thanh_tien'],
                    'ghi_chu' => '',
                ];
            } 
            DB::table('ct_don_hang')->insert($ct_don_hang);

        } 
        catch(\Exception $e)
        {
            DB::rollback();
            return 0;
        }
        // If we reach here, then
        // data is valid and working.
        // Commit the queries!
        DB::commit();

        return $id_donhang;
    }
}
