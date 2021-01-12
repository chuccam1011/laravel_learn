<?php

namespace App\Http\Controllers;

use App\Category;
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
        $cats = Category::all();
        return view('create', [
            'cats' => $cats
        ]);
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
        $post->category_id = $request->input('category_id');

        $post->save();
        return redirect()->route('posts.index');
    }

    public function index(Request $request)
    {
        $key = $request->input('key');
        $posts = Post::query();
        if ($key) {
            $posts->where('title', 'like', "{$key}");
        }
        $posts = $posts->orderBy("id", 'desc')->paginate();
        $data = [
            'posts' => $posts
        ];
        return view('index', $data);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $cats = Category::all();
        return view('edit', [
            'post' => $post,
            'cats' => $cats

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
        $post->category_id = $request->input('category_id');
        $post->save();
        return redirect()->route('posts.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');


    }

    public function fakeData()
    {
        for ($i = 0; $i < 101; $i++) {
            $post = new  Post;

            $post->title = 'Bi thu Ha Noi \'trao doi het le\' voi chu dau tu nha 8B Le Truc hinh anh
Bí thư Hà Nội \'trao đổi hết lẽ\' với chủ đầu tư nhà 8B Lê Trực';
            $post->description = 'Hà Nội vừa hoàn thành việc tháo dỡ tầng 18 và 19 nhà 8B Lê Trực (quận Ba Đình) sau 5 năm xác định sai phạm tại công trình này. Bí thư Thành ủy Vương Đình Huệ đánh giá việc xử lý sai phạm đã đáp ứng được 3 yêu cầu: Kỷ cương pháp luật; an toàn công trình và quyền lợi hợp pháp của các bên liên quan.';
            $post->content = 'Kéo dài 5 năm, giải quyết trong 5 tháng
Chia sẻ tại cuộc họp của Thành ủy Hà Nội về xây dựng Đảng gắn với giải quyết các vấn đề phức tạp, nổi cộm trên địa bàn thành phố vào năm 2020, ông Vương Đình Huệ cho biết chủ đầu tư công trình 8B Lê Trực thường xuyên liên lạc xin gặp Bí thư Thành ủy để trình bày về dự án.

“Tôi đồng ý hẹn gặp và đã ngồi trao đổi hết lẽ 4 tiếng đồng hồ với chủ đầu tư. Tôi cũng nói với chủ đầu tư đây cũng là cuộc gặp duy nhất để sau này Thành phố sẽ thống nhất xử lý sai phạm”, Bí thư Huệ nói tại buổi làm việc.

Theo người đứng đầu Đảng bộ TP, việc xử lý sai phạm ở công trình này cần kiên quyết, nhưng cũng phải kiên trì. TP xử lý dứt điểm được những việc nổi cộm để tạo môi trường thuận lợi cho Đại hội đảng bộ các cấp theo phương châm dễ làm trước, khó làm sau.';
            $post->save();
            echo $i . '<br>';
        }

    }
}
