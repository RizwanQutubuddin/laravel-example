<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function index(){
        $fruits=array("Mango","Grapes","Guava","Banana","Cherry","straw Berry","Water Melon");
        return view("welcome",compact('fruits'));
    }
}
