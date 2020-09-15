<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class textController extends Controller
{
   public function text(){
       return view('index');
   }
}
