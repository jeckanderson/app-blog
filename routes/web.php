<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use \App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\Postingan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// menggunakan clousure
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
        'posts' => Post::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Jeck",
        "email" => "jeckrissen@gmail.ac.id"
    ]);
});

// menggunakan controller
// Route::get('/posts', [PostController::class, 'index']);
// halaman singel post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('admin.app');
// })->middleware('auth');
Route::get('/dashboard', function () {
    return view('admin.dashboard', [
        'posting' => Postingan::all(),
        'category' => Category::all()
    ]);
})->middleware('auth');

Route::get('/post', function () {
    $data = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.id')
        ->get();
    return view('admin.post.index', [
        'posts' => Post::all(),
        'data' => $data
    ]);
})->middleware('auth');
Route::get('/tambah', function () {
    return view('admin.post.tambah', [
        'categories' => Category::all()
    ]);
})->middleware('auth');

Route::get('/c_tambah', function () {
    return view('admin.category.create', [
        'categories' => Category::all()
    ]);
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::post('/postingan', [PostController::class, 'post']);

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');
Route::post('/tambah_category', [CategoryController::class, 'store'])->middleware('auth');
Route::delete('/hapus/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit/{id}', [CategoryController::class, 'edit']);

Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::delete('/hapus_post/{id}', [PostController::class, 'hapus_post']);

// resource controller, controller yg sudah otomatis mengelolah data crud, sehingga tidak perlu lagi manual cari tau route-nya apa
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route untuk mengarah ke controller Category. route ini sudah mengarah ke index show edit destroy yg add di AdminCategoryController tersebut 
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
