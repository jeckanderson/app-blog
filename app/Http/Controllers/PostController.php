<?php

namespace App\Http\Controllers;
// dibawa ini untuk menangani request form dan data di url
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Postingan;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => Post::all()
            //latest digunakan untuk urutan data palingatas
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() // pencarian
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }

    public function post(Request $request)
    {
        $validateDate = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'images' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('images')) {
            $validateDate['images'] = $request->file('images')->store('post-images');
        }

        Post::create($validateDate);
        return redirect('/post')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function hapus_post($id)
    {
        Post::destroy($id);
        return redirect('post')->with('success', 'Data Post di Hapus');
    }
}
