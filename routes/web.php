<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RedirectController;
use App\Models\Contact;

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


Route::get('/', [RedirectController::class, 'general']);
  
Route::get('categories/{category:slug}', [RedirectController::class, 'getCategories']);

Route::get('posts/{post}',[RedirectController::class, 'getPost']);
  
Route::group(['middleware' => 'auth'], function(){
  Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('profile', 'profile')->name('profile');
Route::put('profile', [ProfileController::class , 'update'])->name('profile.update');
});


//Route::get('/dashboard', [RedirectController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


Route::post('posts/{post:id}/comments', [CommentController::class, 'addComment']);

Route::get('admin/posts/create', [PostsController::class, 'create']);
Route::post('admin/posts', [PostsController::class, 'store']);

//Route::get('admin/users', [PostsController::class, 'users'])->middleware('admin')->name('users');
//Route::post('admin/users/update', [PostsController::class , 'update'])->middleware('admin');

//Route::get('admin/index', [PostsController::class, 'allPost'])->middleware('admin')->name('allPost');


//Admin section
Route::middleware('admin')->group(function () {
Route::get('admin/posts/{post}/edit', [PostsController::class, 'edit'])->name('allPost');
Route::post('admin/posts/{post}', [PostsController::class, 'updatePost'])->name('updatePost');
Route::delete('admin/posts/{post}', [PostsController::class, 'delete'])->name('deltePost');
Route::delete('admin/imgs/{img}', [PostsController::class, 'deleteImg'])->name('deleteImg');
Route::get('admin/faq/edit', [FaqController::class, 'edit'])->name('allPost');
Route::post('admin/faq/update/{faq}', [FaqController::class, 'update']);
Route::get('admin/emails', [RedirectController::class, 'emails']);
Route::delete('admin/emails/{mail}', [RedirectController::class, 'deleteEmail']);
Route::get('admin/index', [PostsController::class, 'allPost'])->name('allPost');
Route::get('admin/users', [PostsController::class, 'users'])->name('users');
Route::post('admin/users/update', [PostsController::class , 'update']);

});

/*Route::get('admin/posts/{post}/edit', [PostsController::class, 'edit'])->middleware('admin')->name('allPost');
Route::post('admin/posts/{post}', [PostsController::class, 'updatePost'])->middleware('admin')->name('updatePost');
Route::delete('admin/posts/{post}', [PostsController::class, 'delete'])->middleware('admin')->name('deltePost');
Route::delete('admin/imgs/{img}', [PostsController::class, 'deleteImg'])->middleware('admin')->name('deleteImg');

*/
Route::get('faq/questions', [FaqController::class, 'getFaqs'])->name('faq');

Route::get('author/{user}', [RedirectController::class, 'author']);

Route::get('/contact', [ContactController::class, 'createForm']);

Route::post('/contact', [ContactController::class, 'ContactUsForm'])->name('contact');

//Route::get('admin/emails', [RedirectController::class, 'emails'])->middleware('admin');
//Route::delete('admin/emails/{mail}', [RedirectController::class, 'deleteEmail'])->middleware('admin');

Route::get('/about', [RedirectController::class, 'about']);

require __DIR__.'/auth.php';
