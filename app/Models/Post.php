<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    // use HasFactory, Sluggable;

    protected $fillable = ['category_id', 'title', 'images', 'body'];
    // method ini nilai id nya tidak boleh di isi, sisahnya boleh di isi
    // protected $guarded = ['id'];
    // with digunakan untuk mengurangi jumlah query
    protected $with = ['category', 'author'];

    // pencarian
    // public function scopeFilter($query, array $filters)
    // {
    //     // 1. pencarian dengan cara ke 1
    //     // if(isset($filters['search']) ? $filters['search'] : false) {
    //     //    return $query->where('title', 'like', '%' .$filters('search'). '%')
    //     //           ->orWhere('body', 'like', '%' .$filters('search'). '%');
    //     // }

    //     // 2. pencarian  degan cara ke 2
    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         return $query->where('title', 'like', '%' . $search . '%')
    //             ->orWhere('body', 'like', '%' . $search . '%');
    //     });

    //     // pencarian dengan category, menggunakan callback
    //     $query->when($filters['category'] ?? false, function ($query, $category) {
    //         return $query->whereHas('category', function ($query) use ($category) {
    //             $query->where('slug', $category);
    //         });
    //     });
    //     // pencarian dengan author, meggunakan arrow function
    //     $query->when(
    //         $filters['author'] ?? false,
    //         fn ($query, $author) =>
    //         $query->whereHas(
    //             'author',
    //             fn ($query) =>
    //             $query->where('username', $author)
    //         )
    //     );
    // }

    // relasikan ke Model Category dengan belongsTO
    // nama method category() ini sama dengan nama Modelnya
    // belongsTo artinya 1 postingan itu punya 1 Category 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1  postigan hanya di miliki oleh 1 user. 1 user boleh menulis banyak postingan
    public function author()
    {
        // ini relationship
        return $this->belongsTo(User::class, 'user_id'); // user_id aliasnya nama author supaya sama dengan kasus kita
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
