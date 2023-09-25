<?php 
namespace App\Models;

class Post {
    private static $blog_posts = [
        [
            "title" => "Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Jeck Rissen",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iste sequi necessitatibus! Quibusdam nulla consequuntur ad ullam aliquid quam, atque pariatur perferendis officia veniam est, dolor fugiat, dolore ipsam vel omnis amet aliquam odit. Ut a neque quae ab cum, iusto accusantium ex vero recusandae aut similique tempora dolor explicabo impedit dignissimos in error. Maxime, consectetur? Suscipit modi esse nobis ipsum vel. Illo excepturi delectus eligendi illum pariatur odio! Alias id, tempora quis excepturi amet molestias laborum reiciendis dolore tempore?"
        ],
        [
            "title" => "Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Alexander Roses",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem omnis quam laboriosam odio ea consequuntur vero eius reiciendis quis dolore dolorum dolorem quod a totam voluptatum expedita, rerum atque, repellendus ut. Optio excepturi maiores in temporibus amet et exercitationem delectus voluptatem nemo minus nesciunt, aut laudantium culpa modi libero illo sapiente? Molestiae mollitia ipsa reprehenderit commodi harum vero corrupti eius expedita cupiditate perferendis nemo, dolores voluptas odio consequuntur doloribus laudantium corporis suscipit perspiciatis eveniet itaque ex. Voluptate fuga voluptates voluptas explicabo dolorem. Praesentium totam vel ad atque, ullam nemo, quas fugiat, voluptates in velit ipsam! Neque qui ullam tempora fuga?"
        ]
    ];


    public static function all()
    {
        return collect(self::$blog_posts);
    }


    public static function find($slug)
    {
       $posts = static::all();
    // $posts = self::$blog_posts; // ambil semua post yg paling di atas
    //    $post = [];
    //    foreach ($posts as $p) { // looping satu-satu
    //        if($p["slug"] == $slug ) { // kalau slug itu sama dengan $slug yg di kirim dari parameter
    //            $post = $p;  // maka masukan postingan tersebut ke dalam variabel post
    //        }
    //    }
    // ambil semua post yg bentuk-nya collections lalau cari yg pertama di temukan dimana slug di dlm array itu sama dgn slug yg di kirim dari parameter lalu tamplikan
       return $posts->firstWhere('slug', $slug);
    }



}