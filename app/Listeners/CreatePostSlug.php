<?php

namespace App\Listeners;

use App\Events\PostCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePostSlug
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreate  $event
     * @return void
     */
    public function handle(PostCreate $event)
    {
        //
    }
}
