<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoStudent;

class studentAjaxController extends Controller
{
    
    public function index(){
        $students = Infostudent::orderBy('id','desc')->paginate(4);
        $data_laravel = [
            ["id"=>100, "name"=>"hihi"],
            ["id"=>100, "name"=>"hihi"],
        ];
        $data_laravel2 = 100;

        return view('student.index',[
            'students'=>$students,
            'data_laravel'=>$data_laravel,
            'data_laravel2'=>$data_laravel2
        ]);
    }
  
    public function store(Request $request)
    {
        $student=InfoStudent::create($request->all());
        return response()->json([
            'data'=>$student,
            'message'=>'Tạo sinh viên thành công'
        ],200); // 200 là mã lỗi
    }
  
    public function show($id)
    {
        $student = InfoStudent::find($id);
        return response()->json($student,200); // 200 là mã lỗi
    }
   
    public function edit($id)
    {
        $student=InfoStudent::find($id);
        return response()->json($student,200); // 200 là mã lỗi
    }
  
    public function update(Request $request, $id)
    {
        $student=InfoStudent::find($id)->update($request->all());
        return response()->json(['data'=>$student,'student' => $request->all(),'studentid' => $id,'message'=>'Cập nhật thông tin sinh viên thành công'],200);
    }
    public function destroy($id)
    {
        InfoStudent::find($id)->delete();
        return response()->json(['data'=>'removed'],200);
    }

}
