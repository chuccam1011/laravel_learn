<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;

class DeletePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:delete {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $to = $this->argument('to');
        $from = $this->argument('from');

        $posts = Post::where('id', '>=', $from)->where('id', '<=', $to)->get();

        $bar = $this->output->createProgressBar(count($posts));
        $bar->start();

        foreach ($posts as $post) {
            $post->delete();
            sleep(2);
            $bar->advance();
        }

        $bar->finish();
    }
}
