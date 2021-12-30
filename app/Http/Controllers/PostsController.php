<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Category_post;
use App\Models\Post;
use App\Models\Posts_imgs;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;

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

    public function show(Post $post){
        return view('post',  [
        'post' => $post
        ]);
    }

    public function create(){
        return view('newPost');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

    
    $attributes['user_id'] = auth()->id();
    
    $postit = Post::create($attributes);

    if($request->category_id1 =='1' || $request->category_id1 =='2'){
        $firstCat['category_id'] = $request->category_id1;
    }
    else{
        $firstCat['category_id'] = '3';
    }
   
   
        $firstCat['post_id'] = $postit->id;
        Category_post::create($firstCat);
  

        if($request->category_id2 == '1'|| $request->category_id2 =='2'){
            $secCat['category_id'] = $request->category_id2;
        }
        else{
    $secCat['category_id'] = '3';
        }

        $secCat['post_id'] = $postit->id;
        if($firstCat!=$secCat){
            Category_post::create($secCat);
        }
       
        if($request->category_id3 =='1' || $request->category_id3 =='2'){
            $thirdCat['category_id'] = $request->category_id3;
            
        }
        else{
            $thirdCat['category_id'] = '3';
   
        }

        $thirdCat['post_id'] =  $postit->id;
        
       // dd($postit->categories);
        if($thirdCat!=$secCat && $thirdCat!= $firstCat){
            Category_post::create($thirdCat);
        }



    if( $request->hasFile( 'file_path' ) ) {
        $destinationPath = storage_path( 'app/public/postImages' );
        $file = $request->file_path;
        $fileName = time() . '.'.$file->clientExtension();
        echo($fileName);
        
        $file->storePublicly('/public/postImages');

        $id = $postit->id;
        $img['post_id'] = $id;
        $img['file_path'] = $file->hashName(); 
        Posts_imgs::create($img);
    }
    return redirect('/');
}


public function users(){
    
    return view('users');
}

public function update(Request $request){
    
   // dd($request);
    $id = $request->validate([
        'id' => 'required',
    ]);

    $user =User::where('id', $id)->first();
  //  dd(User::findOrFail($id)->administrator);
  $user->administrator = '1';
  
  $user->update();
  
 
  return redirect()->route('users')->with('message', 'User promoted successfully');

}

 public function allPost()
{
    return view('index',[
        'posts' => Post::paginate(50)
    ]);
}

public function edit(Post $post){

    return view('edit',[
        'post' => $post
    ]);
}
public function updatePost(Post $post){

   
    $data = request()->validate([
        'title' => 'required',
        'body' => 'required',

    ]);

    $post->update($data);

    if( request()->hasFile( 'file_path' ) ) {
        $destinationPath = storage_path( 'app/public/postImages' );
        $file = request()->file_path;
        $fileName = time() . '.'.$file->clientExtension();
        echo($fileName);
        
        $file->storePublicly('/public/postImages');

        $id = $post->id;
        $img['post_id'] = $id;
        $img['file_path'] = $file->hashName(); 
        Posts_imgs::create($img);
    }

    if(request()->category_id1 =='1' || request()->category_id1 =='2'){
        $firstCat['category_id'] = request()->category_id1;
    }
    else{
        $firstCat['category_id'] = '3';
    }
   
    
        $firstCat['post_id'] = $post->id;
        
        $firstCat['category_id_post_id'] = $firstCat['category_id'] . $firstCat['post_id'];
        $post->postCat[0]->update($firstCat);
       

        if(request()->category_id2 == '1'|| request()->category_id2 =='2'){
            $secCat['category_id'] = request()->category_id2;
        }
        else{
    $secCat['category_id'] = '3';
        }

        $secCat['post_id'] = $post->id;
      
        if($firstCat!=$secCat){
            $post->postCat[1]->update($firstCat);
        }
       
        if(request()->category_id3 =='1' || request()->category_id3 =='2'){
            $thirdCat['category_id'] = request()->category_id3;
            
        }
        else{
            $thirdCat['category_id'] = '3';
   
        }

        $thirdCat['post_id'] =  $post->id;
       
        
       // dd($postit->categories);
        if($thirdCat!=$secCat && $thirdCat!= $firstCat){
            $post->postCat[2]->update($thirdCat);
        }


    return back()->with('message', 'Post Updated successfully');
}

public function delete(Post $post){

   
    $post->delete();
    return back()->with('message', 'Post Deleted successfully');

}

public function deleteImg(Posts_imgs $img){

    $img->delete();
    return back()->with('message', 'Image Deleted successfully');

}
}