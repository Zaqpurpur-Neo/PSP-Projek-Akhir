<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = BlogPost::latest()->take(7)->get();
    $category = Category::all();

    return view('welcome', [
        "route_name" => "/",
        "posts" => $posts,
        "count" => count($posts),
        "category" => $category
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blog', function () {
    $posts = BlogPost::all();
    return view('blog', [
        'active' => 'blog',
        'posts' => $posts,
        "route_name" => "/blog"
    ]);
});

Route::get('/blog', [PostController::class, 'main']);

Route::get('/blog/p/{post}', [PostController::class, 'blog_post']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'index']);

    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);

    Route::get('/post/{post}/edit', [PostController::class, 'edit']);
    Route::post('/post/{post}/update', [PostController::class, 'update']);
    Route::delete('/post/{post}', [PostController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{category:slug}/update', [CategoryController::class, 'update']);
    Route::delete('/category/{category:slug}', [CategoryController::class, 'destroy']);

});

require __DIR__.'/auth.php';
