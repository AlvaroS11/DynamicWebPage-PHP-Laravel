<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', [PostController::class, 'index'])->name('home);
*/

Route::get('/', function () { 
  //$posts = Post::with('category')->get();
 $posts = Post::latest();

 

  if(request ('search')){
    $posts
        ->where('title', 'like', '%' . request('search') . '%');
       
}
 
  return view('posts', ['posts' => $posts -> get(),
   'categories' => Category::all()
]);
});



Route::get('categories/{category:slug}', function (Category $category){
  return view('posts',[
    'posts' => $category -> posts,
    'categories' => Category::all(),
    'current' => $category
  ]);
});

Route::get('posts/{post}', function(Post $post){
  // Find a post by its slug and pass it to a view called "post"
  
return view('post',[
    'post' => $post,
    'categories' => Category::all()
    ]);  //$post

});

