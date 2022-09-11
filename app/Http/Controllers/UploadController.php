<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadForm(){
        return view('upload');
    }
    public function uploadFile(Request $request){
        $request->file->store('store');
        return back()->with('success','File has been successfully uploaded');
    }
}
