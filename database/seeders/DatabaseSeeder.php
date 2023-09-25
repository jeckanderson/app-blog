<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // 1 User
        User::create([
            'name' => 'Jeck Rissen',
            'username' => 'jeckrissen',
            'email' => 'jeckrissen@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // User::create([
        //     'name' => 'Alexander Post',
        //     'email' => 'alexanderpost.com',
        //     'password' => bcrypt('12345'),
        // ]);

        // bikin User 5 orang
        User::factory(3)->create();

        // // bikin Category 2
        // 2 Category Web Programing dan Personal
        Category::create([
            'name' => 'Web Programing',
            // 'slug' => 'web-programing'
        ]);
        Category::create([
            'name' => 'Web Design',
            // 'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            // 'slug' => 'personal'
        ]);

        // bikin post 20
        Post::factory(10)->create();

        // 3 Buah Post
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa sit aspernatur reiciendis! Ducimus quia illo nesciunt dolores placeat doloremque ad excepturi asperiores qui expedita odit debitis corrupti consequuntur nisi fugit alias non laborum, quas nulla, aspernatur omnis mollitia? Placeat praesentium omnis quasi quam nemo quo, numquam harum sequi odit, excepturi earum qui accusantium animi molestias magnam, perspiciatis porro hic. Tenetur nulla incidunt rem beatae, delectus est, earum veritatis suscipit enim quae, fugit quisquam voluptates eius nobis mollitia possimus! Sed culpa perspiciatis fugit mollitia, excepturi ipsa suscipit molestias sapiente voluptatibus. Temporibus a exercitationem vero incidunt.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa sit aspernatur reiciendis! Ducimus quia illo nesciunt dolores placeat doloremque ad excepturi asperiores qui expedita odit debitis corrupti consequuntur nisi fugit alias non laborum, quas nulla, aspernatur omnis mollitia? Placeat praesentium omnis quasi quam nemo quo, numquam harum sequi odit, excepturi earum qui accusantium animi molestias magnam, perspiciatis porro hic. Tenetur nulla incidunt rem beatae, delectus est, earum veritatis suscipit enim quae, fugit quisquam voluptates eius nobis mollitia possimus! Sed culpa perspiciatis fugit mollitia, excepturi ipsa suscipit molestias sapiente voluptatibus. Temporibus a exercitationem vero incidunt.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);


        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa sit aspernatur reiciendis! Ducimus quia illo nesciunt dolores placeat doloremque ad excepturi asperiores qui expedita odit debitis corrupti consequuntur nisi fugit alias non laborum, quas nulla, aspernatur omnis mollitia? Placeat praesentium omnis quasi quam nemo quo, numquam harum sequi odit, excepturi earum qui accusantium animi molestias magnam, perspiciatis porro hic. Tenetur nulla incidunt rem beatae, delectus est, earum veritatis suscipit enim quae, fugit quisquam voluptates eius nobis mollitia possimus! Sed culpa perspiciatis fugit mollitia, excepturi ipsa suscipit molestias sapiente voluptatibus. Temporibus a exercitationem vero incidunt.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);


        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus dolor tempora eligendi fugit ipsa sit aspernatur reiciendis! Ducimus quia illo nesciunt dolores placeat doloremque ad excepturi asperiores qui expedita odit debitis corrupti consequuntur nisi fugit alias non laborum, quas nulla, aspernatur omnis mollitia? Placeat praesentium omnis quasi quam nemo quo, numquam harum sequi odit, excepturi earum qui accusantium animi molestias magnam, perspiciatis porro hic. Tenetur nulla incidunt rem beatae, delectus est, earum veritatis suscipit enim quae, fugit quisquam voluptates eius nobis mollitia possimus! Sed culpa perspiciatis fugit mollitia, excepturi ipsa suscipit molestias sapiente voluptatibus. Temporibus a exercitationem vero incidunt.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
