<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserModel;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    
    public function index()
    {
        $user_model = new UserModel(); //new ra model
        $users = $user_model->LayHet(); // goi model
        $tong_tien = 1000000;
        return view('admin.sanpham.index', compact('users','tong_tien'));
    }
    
}