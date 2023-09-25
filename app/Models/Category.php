<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // method ini untuk menghubungank Model Category dengan Model Post
    // kalau di Model Post itu relasinya memiliki 1 category post
    // kalau yang untuk yang Model category ini 1 category itu bisa saja di milikih oleh banyak posts 
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
