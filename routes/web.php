<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

Route::get('/', function () { 

    //return view ('welcome');
    $posts = Post::with('category')->get();
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
  
Route::group(['middleware' => 'auth'], function(){
  Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('profile', 'profile')->name('profile');
Route::put('profile', [ProfileController::class , 'update'])->name('profile.update');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::post('posts/{post:id}/comments', [CommentController::class, 'addComment']);

Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostsController::class, 'store'])->middleware('admin');

Route::get('admin/users', [PostsController::class, 'users'])->middleware('admin')->name('users');
Route::post('admin/users/update', [PostsController::class , 'update'])->middleware('admin');

Route::get('admin/index', [PostsController::class, 'allPost'])->middleware('admin')->name('allPost');

Route::get('admin/posts/{post}/edit', [PostsController::class, 'edit'])->middleware('admin')->name('allPost');
Route::post('admin/posts/{post}', [PostsController::class, 'updatePost'])->middleware('admin')->name('updatePost');
Route::delete('admin/posts/{post}', [PostsController::class, 'delete'])->middleware('admin')->name('deltePost');
Route::delete('admin/imgs/{img}', [PostsController::class, 'deleteImg'])->middleware('admin')->name('deleteImg');

Route::get('faq/questions', [FaqController::class, 'getFaqs'])->name('faq');
Route::get('admin/faq/edit', [FaqController::class, 'edit'])->middleware('admin')->name('allPost');
Route::post('admin/faq/update/{faq}', [FaqController::class, 'update'])->middleware('admin');




require __DIR__.'/auth.php';
