<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bangsanpham;

class SanphamController extends Controller
{
    public function index()
    {
        $san_pham = bangsanpham::orderBy('id', 'desc')->get();
        // var_dump($san_pham);
        // exit;
        return view('index', [
            'san_pham' => $san_pham
        ]);
    }
    public function xoa($id)
    {
        bangsanpham::find($id)->delete();
        return response()->json(["success" => true], 200);
    }
    //sanpham/xoa/1

    public function XuLyThem(Request $request)
    {

        //luu vao db
        $student = bangsanpham::create($request->all());
        return response()->json([ //200 goi tin tra ve => ok
            'data' => $student,
            'message' => 'Tạo san pham thành công',
            'data_nhan' => $request->all()
        ], 200);
    }
    public function edit($id)
    {
        $san_pham = bangsanpham::find($id);
        return response()->json($san_pham, 200);
    }

    public function suasanpham(Request $request, $id)
    {
        $san_pham = bangsanpham::find($id)->update($request->all());
        return response()->json(['san_pham' => $san_pham, 'student' => $request->all(), 'studentid' => $id, 'message' => 'Cập nhật thông tin sinh viên thành công'], 200);
    }
    public function show($id)
    {
        $student = bangsanpham::find($id);
        return response()->json($student,200); // 200 là mã lỗi
    }
}
