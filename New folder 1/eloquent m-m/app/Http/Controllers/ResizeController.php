<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ResizeController extends Controller
{
    public function resize(){
        $image = Image::make('/path/to/image.jpg');
        $image->fit(600, 600)->save('path/to/save/large.jpg');
        $image->fit(400, 400)->save('path/to/save/medium.jpg');
        $image->fit(150, 150)->save('path/to/save/thumbnail.jpg');
         
        return 'Done';
    }
}
