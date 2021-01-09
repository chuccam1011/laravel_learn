<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PostsController extends BaseController
{


    public function create()
    {
        return view('create');
    }

    public function createPosts(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $content = $request->input('content');
        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function index()
    {

        $posts = Post::all();
        $data = [
            'posts' => $posts
        ];
        return view('index', $data);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', [
            'post' => $post
        ]);

    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $title = $request->title;
        $description = $request->description;
        $content = $request->input('content');
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');


    }
}
