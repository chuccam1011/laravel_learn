<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function posts($id)
    {
        /* @var Category $cat
         */
        $cat = Category::find($id);
        $posts = $cat->posts()->paginate(2);
        return view('category.posts', compact('posts'));

    }
}
