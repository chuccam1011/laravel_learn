<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateNewPost;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PostsController extends BaseController
{

    /**
     * Create new Post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        if (Gate::denies('post-create')){
            abort(403);
        }
        $cats = Category::all();
        $tags = Tag::all();
        return view('create', [
            'cats' => $cats,
            'tags' => $tags
        ]);
    }

    /**
     * Create new Post and insert database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPosts(CreateNewPost $request)
    {
//        $request->validate([
//            'title' => 'required|min:8|unique:posts',
//            'category_id' => 'required',
//            'description' => 'required',
//            'content' => 'required'
//        ], [
//                'title.required' => "Tieeu canf k ddduocjw trongs"
//            ]
//        );

//
//        $validator = Validator::make($request->all(), [
//            'title' => 'required|min:8|unique:posts',
//            'category_id' => 'required',
//            'description' => 'required',
//            'content' => 'required'
//        ], [
//                'title.required' => "Tieeu canf k ddduocjw trongs"
//            ]
//        );dd
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        $post = new Post;
        $title = $request->title;
        $description = $request->description;
        $content = $request->input('content');

        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->category_id = $request->input('category_id');

        $tagsIds = $request->input('tag_id', []);
        $post->save();
        $post->tags()->sync($tagsIds);

        return redirect()->route('posts.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (Gate::denies('post-index')){
            abort(403);
        }

        $key = $request->input('key');
        $tag_ids = $request->input('tag_ids', []);
        $category_id = $request->input('category_id');
        $posts = Post::query();
        if ($key) {
            $posts->where('title', 'like', "%{$key}%");
        }
        if (count($tag_ids) > 0) {
            $posts->whereHas('tags', function ($query) use ($tag_ids) {
                $query->whereIn('tag.id', $tag_ids);
            });
        }

        if ($category_id) {
            $posts->where('category_id', $category_id);

        }

//        $posts = $posts->orderBy("id", 'desc')->paginate();
        $posts->latest('id');

        $data = [
            'posts' => $posts->paginate(10),
            'tags' => Tag::all(),
            'cats' => Category::all()
        ];
        return view('index', $data);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cats = Category::all();
        $tags = Tag::all();
        return view('edit', [
            'post' => $post,
            'cats' => $cats,
            'tags' => $tags

        ]);

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8|unique:posts,title,' . $id . ',id',
            'category_id' => 'required',
            'description' => 'required',
            'content' => 'required'
        ], [
                'title.required' => "Tieeu ddeef k0 ddduocjw trongs"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);
        /*
            @var \App\Post $post
         */
        $title = $request->title;
        $description = $request->description;
        $content = $request->input('content');

        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->category_id = $request->input('category_id');
        $tagsIds = $request->input('tag_id', []);

        $post->save();
        $post->tags()->sync($tagsIds);
        event( new \App\Events\PostUpdate($post));
        return redirect()->route('posts.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function fakeData()
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new  Post;

            $post->title = 'Bi thu Ha Noi \'trao doi het le\' voi chu dau tu nha 8B Le Truc hinh anh
Bí thư Hà Nội \'trao đổi hết lẽ\' với chủ đầu tư nhà 8B Lê Trực';
            $post->description = 'Hà Nội vừa hoàn thành việc tháo dỡ tầng 18 và 19 nhà 8B Lê Trực (quận Ba Đình) sau 5 năm xác định sai phạm tại công trình này. Bí thư Thành ủy Vương Đình Huệ đánh giá việc xử lý sai phạm đã đáp ứng được 3 yêu cầu: Kỷ cương pháp luật; an toàn công trình và quyền lợi hợp pháp của các bên liên quan.';
            $post->content = 'Kéo dài 5 năm, giải quyết trong 5 tháng
Chia sẻ tại cuộc họp của Thành ủy Hà Nội về xây dựng Đảng gắn với giải quyết các vấn đề phức tạp, nổi cộm trên địa bàn thành phố vào năm 2020, ông Vương Đình Huệ cho biết chủ đầu tư công trình 8B Lê Trực thường xuyên liên lạc xin gặp Bí thư Thành ủy để trình bày về dự án.
“Tôi đồng ý hẹn gặp và đã ngồi trao đổi hết lẽ 4 tiếng đồng hồ với chủ đầu tư. Tôi cũng nói với chủ đầu tư đây cũng là cuộc gặp duy nhất để sau này Thành phố sẽ thống nhất xử lý sai phạm”, Bí thư Huệ nói tại buổi làm việc.
Theo người đứng đầu Đảng bộ TP, việc xử lý sai phạm ở công trình này cần kiên quyết, nhưng cũng phải kiên trì. TP xử lý dứt điểm được những việc nổi cộm để tạo môi trường thuận lợi cho Đại hội đảng bộ các cấp theo phương châm dễ làm trước, khó làm sau.';
            $post->category_id=1;
            $post->save();
            echo $i . '<br>';
        }

    }
}
