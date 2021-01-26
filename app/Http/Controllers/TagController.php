<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function posts($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate();
        return view('tag.posts', ['posts' => $posts]);
    }
}

