<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("dinhthienlong1@gmail.com")->send(new MailNotify($objDemo));
    }
}