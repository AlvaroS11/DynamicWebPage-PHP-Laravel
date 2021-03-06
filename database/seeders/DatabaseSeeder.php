<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Category_post;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Posts_imgs;
use App\Models\Post;
use App\Models\User;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\User::truncate();
        //\App\Models\Category::truncate();
       // \App\Models\Category_post::truncate();

        $usernames = [ 'jonhh123', 'peter456', 'johan789' ];

        User::factory()->create(([
            'id'=>'1',
            'name'=>'XPrint',
            'file_path'=>'XPrint.png',
            'password'=> bcrypt('Password!321'),
            'email'=>'xprint@xprint.xprint'
        ]));

        
        User::factory()->create(([
            'id'=>'2',
            'name'=>'admin',
            'file_path'=>'XPrint.png',
            'password'=> bcrypt('Password!321'),
            'email'=>'admin@ehb.be',
            'administrator' => '1'
        ]));

         \App\Models\User::factory(10)->create();

         Post::factory(5)->create([
            'user_id'=>'1',
        ]);

        $shisha = Category::create([
             'name'=>'Shisha',
             'slug'=>'shisha'
         ]);

         $carAccesories = Category::create([
             'name'=> 'Car accesories',
             'slug'=> 'carAccesories'
         ]);

         Category::create([
            'name'=> 'Other',
            'slug'=> 'other'
        ]);


       

         \App\Models\Category_post::create([
             'category_id' => $carAccesories->id,
             'post_id'=> '2'
         ]);

         \App\Models\Category_post::create([
            'category_id' => $shisha->id,
            'post_id'=> Post::factory()->create()->id
        ]);

        \App\Models\Category_post::create([
            'category_id' => $carAccesories->id,
            'post_id'=> Post::factory()->create()->id
        ]);
        Category_post::factory(25)->create();
        Comment::factory(10)->create();
        Posts_imgs::factory(50)->create();

       Faq::factory(10)->create();
        Contact::factory(10)->create();
    
    }
}
