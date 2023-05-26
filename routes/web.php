<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->usersCoolPosts()->latest()->get();
    }

    //$posts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);

});
Route::view('/main', 'main');

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/login-page', [UserController::class, 'logInPage'])->name('login');


//Blog relate Posts
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/create-page', [PostController::class, 'createPage'])->name('create');
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete/{post}', [PostController::class, 'delete'])->name('posts.delete');
