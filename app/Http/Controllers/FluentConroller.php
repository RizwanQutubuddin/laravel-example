<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentConroller extends Controller
{
    public function index(){
        echo "<h1>Fluent String</h1>";
        $slice=Str::of('Welcome my youtube channel')->after('Welcome my');
        echo "<p>$slice</p>";
        $slice2=Str::of('Welcome my youtube channel')->afterLast('be');
        echo "<p>$slice2</p>";
        $slice3=Str::of('WELCOME TO STRING')->lower();
        echo "<p>$slice3</p>";
        $slice4=Str::of('Welcome my youtube channel')->upper();
        echo "<p>$slice4</p>";
        $slice5=Str::of('Welcome my youtube channel')->replace('channel','vlog');
        echo "<p>$slice5</p>";
        $slice6=Str::of('WELCOME TO STRING')->title();
        echo "<p>$slice6</p>";
    }
}
