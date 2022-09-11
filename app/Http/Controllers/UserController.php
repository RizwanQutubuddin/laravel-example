<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $name="Rizwan khan";
        $users=array("name"=>"Rizwan Ali","email"=>"rizwan@gmail.com","phone"=>"9876543210");
        return view('user',compact('name','users'));
    }

    public function index2(Request $request){
        return $request->fullUrl();
    }
}
