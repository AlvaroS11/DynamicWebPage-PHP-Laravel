<?php

namespace App\Http\Controllers;

use App\Mail\AdminMAil;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoEmail;
use Illuminate\Contracts\Mail\Mailable;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class RedirectController extends Controller 
{
    public function getPost(Post $post) {
         // Find a post by its id and pass it to a view called "post"
  return view('post',[
    'post' => $post,
    'categories' => Category::all()
    ]);  
      }

      public function getCategories(Category $category) {
        // Find a category and pass posts, categories, and CurrentCat to a view called "posts"
        return view('posts',[
          'posts' => $category -> posts,
          'categories' => Category::all(),
          'current' => $category
        ]);
     }

     public function general() {
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
     }

     public function dashboard(){

      return view('dashboard');
     }

     public function author(User $user){
      return view('author',[
        'user'=>$user
      ]);
     }

     public function emails(){
      return view('mail',[
        'mail'=> Contact::all()
      ]);
     }

     public function about(){
       return view('about');
     }

     public function deleteEmail(Contact $mail){
      $mail->delete();
      return back()->with('message', 'Email Deleted successfully');
     }
    }