<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::delete('/postsDestroy/{post}',[PostController::class,'destroy'])->name("posts.destroy");

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name("posts.edit");
Route::put('/posts/{post}/edit', [PostController::class, 'update'])->name("posts.update");

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get("/post/{postid}/restore",[PostController::class,"restore"])->name(name:"posts.restore")->withTrashed();


Route::get("/posts/archive",[PostController::class,"archive"])->name(name:"posts.archive");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

