<?php

use App\Models\Category_post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->foreignId('category_id');
            $table->foreignId('post_id');
            $table->string('category_id_post_id')
            ->virtualAs('concat(category_id,post_id)')
            ->index();
           // $table->id('category_id', 'post_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    
    public function down()
    {
        Schema::dropIfExists('category_post');
        //myDropColumnIfExists('category_id', 'post_id');
        
        if (Schema::hasColumn('category_post', 'category_id_post_id'))
        {
            Schema::table('category_post', function (Blueprint $table)
            {
                $table->dropColumn('category_id_post_id');
            });
        }
    }

    
}

 function myDropColumnIfExists($myTable, $column)
    {
        if (Schema::hasColumn($myTable, $column)) //check the column
        {
            Schema::table($myTable, function (Blueprint $table) use ($column) {
                $table->dropColumn($column);
            });
        }
    
    }