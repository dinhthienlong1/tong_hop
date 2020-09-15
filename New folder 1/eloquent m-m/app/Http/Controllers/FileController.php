<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\sanpham;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class FileController extends Controller
{
   public function index(){
    $image = sanpham::latest()->first();
    return view('upload.demo', compact('image'));
   }
  
   public function upload(Request $request){
    if ($request->hasFile('file1')) {
        $originalImage = $request->file1;
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/uploads/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
        // var_dump($thumbnailPath);
        // exit;
        $imagemodel= new sanpham($request->all());
        foreach ($request->sanphams as $photo) {
            $filename = $photo->store('hinh_anh');
            sanpham::create([
                'imagemodel_id' => $imagemodel->id,
                'filename' => $filename
            ]);
        }
        // $imagemodel->sanphams=time().$originalImage->getClientOriginalName();
        // $imagemodel->save();

        return back()->with('success', 'Your images has been successfully Upload');
        // $originalImage->move( public_path('uploads'), gen_randome().'.'.$originalImage->getClientOriginalExtension());
        // return 1;
        
    }
   }
   

}
