<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/hello', 'PageController@Hello');
Route::get('/create-post', function () {
    $post = new \App\Post;
    $post->title = 'Helleo';
    $post->description = 'psdop[ podp[asod p[fop orfp[sodp[fos ';
    $post->content = 'psdop[ podp[asod p[fop orfp[sodp[fopsdop[ podp[asod p[fop orfp[sodp[fopsdop[ podp[asod p[fop orfp[sodp[fopsdop[ podp[asod p[fop orfp[sodp[fo';
    $post->status = 1;
    $post->category_id = 1;
    $post->user_id = 1;
    $post->save();
    echo "Created";
});
Route::get('/delete-post', function () {
    $post = \App\Post::find(5);
    $post->title = 'dasjlisdjlidj';
    $post->description = 'fp[sodp[fos ';
    $post->content = 'pp[fopsdop[ podp[asod p[fop orfp[sodp[fopsdop[ podp[asod p[fop orfp[sodp[fopsdop[ podp[asod p[fop orfp[sodp[fo';
    $post->status = 1;
    $post->category_id = 1;
    $post->user_id = 1;
    $post->save();
    echo "udpate";
});
Route::get('/delete-post', function () {
    $post = \App\Post::where('id', '<', 10)->where('category_id', 2);
    $post->delete();
    echo "Deleted";
});
Route::get('/count-post', function () {
    $totalPost = \App\Post::where('category_id', 1)->count();
    echo $totalPost . "  is total post";
});
Route::get('/posts', function () {
    $posts = \App\Post::all();
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});
Route::get('/posts-by-category', function () {
    $posts = \App\Post::where('category_id', 1)->where('status', 1)->get();
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});
Route::get('/posts-by-whereOr', function () {
    $posts = \App\Post::where('id', 8)->orwhere(function ($quary) {
        $quary->where('id', 10);
        $quary->where('status', 0);
    })->get();
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});
Route::get('/giai-ptb2', 'Ptb2@getFormGiaiPTB2');
Route::get('/giai-ptb2-submit', 'Ptb2@getFormGiaiPTB2Submit');

Route::get('/register', 'AuthController@register');
Route::post('/submit-register', 'AuthController@getSubmitRegister')->name('register');

Route::put('/posts', 'PostController@update');
Route::get('/posts-edit', 'PostController@update');

Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@createPosts')->name('posts.store');
Route::get('/index', 'PostsController@index')->name('posts.index');

Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}', 'PostsController@update')->name('posts.update');

Route::delete('/posts/{id}/delete', 'PostsController@delete')->name('posts.delete');
Route::get('/fake-data', 'PostsController@fakeData')->name('posts.fake_data');

Route::get('/fake-user', function () {
    $user = new \App\User;
    $user->name = "chuc";
    $user->full_name = "cam chuc";
    $user->email = "chuccam@dja.com";
    $user->password = bcrypt('12345');
    $user->save();
});
Route::get('relationship/1-1', function () {
    $user = \App\User::find(1);
    /* @var \App\User $user
     */
    echo "name: {$user->name}";
    echo "Add : {$user->profile->address}";

});
Route::get('relationship/1-1-reverse', function () {
    $profile = \App\Profile::find(1);
    /* @var \App\Profile $profile
     */
    echo "in_code: {$profile->in_code}" . '<br>';
    echo "user. email : {$profile->user->email}";

});
Route::get('category/{id}/posts', "CategoryController@posts");
Route::get('tag/{id}/posts', "TagController@posts");
