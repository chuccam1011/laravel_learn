<?php

namespace App\Console\Commands;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Console\Command;

class InitWebisteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init webiste data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $this->error("Has error");
//        $this->info("Has no error");
        $this->initUser();
        $this->initTags();
        $this->initPost();
        $this->initCategory();

    }

    private function initUser()
    {
        $user = new \App\User;
        $user->name = "chuccc";
        $user->full_name = "cam  ff chuc";
        $user->email = "camchuc@dja.com";
        $user->gender = 0;
        $user->password = bcrypt('12345');
        $user->type = 2;
        $user->save();
        $this->info("Call Init User");
    }

    private function initPost()
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
        }
        $this->info("Call initPost");
    }

    private function initCategory()
    {
        $categories= new Category;
        $categories->name='Tuoi tre';
        $categories->description='Tuoi tre';
        $categories->save();

        $categories= new Category;
        $categories->name='Covid 19';
        $categories->description='Covid';
        $categories->save();
        $this->info("Call initCategory");
    }

    private function initTags()
    {
        $tags= new Tag;
        $tags->name='MMA';
        $tags->save();

        $tags= new Tag;
        $tags->name='Covid';
        $tags->save();

        $this->info("Call initTags ");
    }
}
