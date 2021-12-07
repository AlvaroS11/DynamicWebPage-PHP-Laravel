<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::latest();

        if(request ('search')){
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');

        }

    }

    public function show(){
        return view('post',  [
        'post' => $post
        ]);
    }
}
