<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'price', 'stars'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imgs(){
        return $this->hasMany(Posts_imgs::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function postCat()
    {
        return $this->hasMany(Category_post::class);
    }

}
 