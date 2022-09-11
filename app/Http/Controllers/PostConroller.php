<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostConroller extends Controller
{
    public function getAllPosts()
    {
        $posts = DB::table('posts')->get();
        return view('/posts', compact('posts'));
    }

    public function addPost()
    {
        return view('add-post');
    }

    public function addPostSubmit(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required|min:5'
            ]
        );

        DB::table('posts')->insert([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return back()->with('success','Post has been created successfully');
    }

    public function getPostById($id=null){
        $post=DB::table('posts')->where('id',$id)->first();
        //return $post;
        return view('single-post',compact('post'));
    }

    public function getUpdateById(Request $request,$id=null){
        if($id){
            DB::table('posts')->where('id',$id)->update(['title'=>$request->title,'body'=>$request->body]);
            return back()->with('success','Post has been updated successfully');
        }
    }

    public function getDeleteById($id=null){
        if($id){
            DB::table('posts')->where('id',$id)->delete();
            return back()->with('success','Post has been deleted successfully');
        }else{
            return back()->with('fail','Please enter valid id');
        }
    }

    public function innerjoinCaluse(){
        $request = DB::table('users')
        ->join('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')
        ->get();
        return $request;
    }

    public function leftjoinCaluse(){
        $request = DB::table('users')
        ->leftjoin('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')
        ->get();
        return $request;
    }

    public function rightjoinCaluse(){
        $request = DB::table('users')
        ->rightjoin('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')
        ->get();
        return $request;
    }

    public function getAllPostsUsingModel(){
        $post=Post::all();
        return $post;
    }
}
