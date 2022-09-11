<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PaginationController extends Controller
{
    public function pagination(){
        $posts=Post::paginate(50);
        return view('pagination',compact('posts'));
    }
}
