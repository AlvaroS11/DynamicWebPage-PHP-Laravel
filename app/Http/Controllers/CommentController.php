<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function addComment(Post $post){
       
       
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body'=>request('body'),
        ]);

        return back();
    }
}
