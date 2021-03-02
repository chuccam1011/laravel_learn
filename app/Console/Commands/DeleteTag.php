<?php

namespace App\Console\Commands;

use App\Tag;
use Illuminate\Console\Command;

class DeleteTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tags:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a tag';

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
        $id = $this->argument('id');
        $tag= Tag::find($id);

        if(!$tag){
            $this->error("Tag is not defined");
            return;
        }

        $isDelete= $this->confirm("Do you want to Delete?");
        if ($isDelete){
            $isDeletePost= $this->confirm("Do you want to delete Posts of this Tag");
            if ($isDeletePost){
                $totalPost= $this->ask("How many you want to Delete");
                $posts = $tag->posts()->limit((int)$totalPost)->get();
                foreach ($posts as $post){
                    $post->delete();
                }
            }
            $tag->delete;
        }
        $this->info("Deleted");



    }
}
