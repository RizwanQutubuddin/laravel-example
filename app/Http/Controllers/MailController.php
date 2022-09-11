<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){
        $details = [
            'title'=>'Mail from rizwan side',
            'body'=>'this is for testing mail'
        ];

        Mail::to('rizwan.qutubuddin@gmail.com')->send(new TestMail($details));
        return "Email sent";
        // print_r($details);
    }
}
