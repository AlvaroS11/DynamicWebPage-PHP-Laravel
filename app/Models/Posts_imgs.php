<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts_imgs extends Model
{
    protected $table = 'posts_imgs';

    use HasFactory;
    
    protected $fillable = [
        'file_path',
        'post_id'

    ];

    public function posts(){
      
        return $this->belongsTo(Post::class);
    }
  
    
}
