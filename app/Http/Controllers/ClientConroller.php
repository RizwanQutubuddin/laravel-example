<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientConroller extends Controller
{
    public function getAllPost(){
        $response=Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }
    public function getPostById($id=null){
        $response=Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }
    public function addPost(){
        $post=Http::post('https://jsonplaceholder.typicode.com/posts',[
            'userId'=>1,
            'title'=>'New Post Title',
            'body'=>'New Post Description'
        ]);
        return $post->json();
    }

    public function updatePost(){
        $post=Http::put('https://jsonplaceholder.typicode.com/posts/1',[
            'title'=>'Updated Post Title',
            'body'=>'Updated Post Description'
        ]);
        return $post->json();
    }

    public function deletePost($id){
        $post=Http::delete('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $post->json();
    }
}
