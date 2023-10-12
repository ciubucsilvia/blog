<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;

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

Route::group([
	'middleware' => 'admin',
], function(){

});

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes();
Route::middleware('guest')->group(function(){
	Route::get('register', [AuthController::class, 'registerForm']);
	Route::post('register', [AuthController::class, 'register']);
	Route::get('login', [AuthController::class, 'loginForm'])->name('login');
	Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
	Route::get('profile', [ProfileController::class, 'index']);
    Route::post('profile', [ProfileController::class, 'store']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('comment', [CommentsController::class, 'store']);
});



Route::name('admin.')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('posts', AdminPostController::class);
    Route::resource('comments', AdminCommentController::class);
    Route::resource('subscription', AdminSubscriptionController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('tags', AdminTagController::class);
    // Route::get('comments', [AdminCommentController::class, 'index']);
});
