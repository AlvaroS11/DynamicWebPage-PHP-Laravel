<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
            'name'=>'XPrint'
        ]));
         \App\Models\User::factory(10)->create();

        $shisha = Category::create([
             'name'=>'Shisha',
             'slug'=>'shisha'
         ]);

         $carAccesories = Category::create([
             'name'=> 'Car accesories',
             'slug'=> 'carAccesories'
         ]);

         $writer = User::factory()->create();
         $post = Post::factory()->create(([
            'user_id' => $writer->id,
        ]));

         \App\Models\Category_post::create([
             'category_id' => '1',
             'post_id'=> $post->id
         ]);


         $writer = User::factory()->create();
         $post = Post::factory()->create(([
            'user_id' => $writer->id,
        ]));

         \App\Models\Category_post::create([
             'category_id' => $carAccesories->id,
             'post_id'=> $post->id
         ]);

         \App\Models\Category_post::create([
            'category_id' => $shisha->id,
            'post_id'=> Post::factory()->create()->id
        ]);

        \App\Models\Category_post::create([
            'category_id' => $carAccesories->id,
            'post_id'=> Post::factory()->create()->id
        ]);

        



         


    }
}
