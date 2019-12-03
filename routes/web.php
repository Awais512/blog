<?php
//Done
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

use App\Http\Controllers\blog\PostsController;

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
    Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
    Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::get('trashed', 'PostController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'PostController@restore')->name('restore-post');
    Route::resource('tags', 'TagsController');
});
// Route::middleware(['auth', 'admin'])->group(function () {

// });
Route::get('users', 'UsersController@index')->name('users.index');
Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
