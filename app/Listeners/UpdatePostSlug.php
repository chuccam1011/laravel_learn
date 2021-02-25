<?php

namespace App\Listeners;

use App\Events\PostUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdatePostSlug
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
     * @param  PostUpdate  $event
     * @return void
     */
    public function handle(PostUpdate $event)
    {
        $title = $event->post->title;
        $slug = Str::slug($title);
        $event->post->slug = $slug;
        $event->post->save();
    }
}
