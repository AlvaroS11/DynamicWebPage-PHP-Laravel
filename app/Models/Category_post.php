<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    protected $table = 'category_post';
    protected $primaryKey = 'category_id_post_id';
    public $incrementing = false;

    use HasFactory;
    
    protected $fillable = ['category_id', 'post_id'];

    public function posts(){
      
        return $this->hasMany(Post::class);
    }
}
