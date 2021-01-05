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
    $posts = \App\Post::where('category_id',1)->where('status',1)->get();
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});
Route::get('/posts-by-whereOr', function () {
    $posts = \App\Post::where('id',8)->orwhere(function ($quary){
        $quary->where('id',10);
        $quary->where('status',0);
    })->get();
    foreach ($posts as $post) {
        echo $post->title . '<br>';
    }
});
Route::get('/giai-ptb2', 'Ptb2@getFormGiaiPTB2');
Route::get('/giai-ptb2-submit', 'Ptb2@getFormGiaiPTB2Submit');
Route::get('/login', 'AuthController@Login');
Route::post('/login', 'AuthController@getFormSubmit');
