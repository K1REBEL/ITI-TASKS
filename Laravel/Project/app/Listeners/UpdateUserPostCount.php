<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserPostCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event)
    {
        $post = $event->post; // Get the created post
        $user = User::find($post->user_id);// Get the associated user

        // Increment the post_count field
        $user->increment('post_count');
    }
}
