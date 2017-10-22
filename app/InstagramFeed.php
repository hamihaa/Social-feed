<?php

namespace App;

use Carbon\Carbon;
use League\Flysystem\Exception;

class InstagramFeed extends Feed
{
    protected $fillable = ['uid', 'post_type', 'username', 'image', 'description', 'added_at'];

    /**
     * Store new instagram post
     * @param $post
     * @return \Exception|Exception
     */
    public static function storeNewPost($post)
    {
        $newPost = new InstagramFeed;
        $newPost->uid = $post->id;
        $newPost->username = $post->user->username; // could be hardcoded in view or made to Author model

        $cap = $post->caption;
        if (isset($cap->text)){
            $newPost->description = $cap->text;
        }

        $newPost->post_type = 0; //instagram type
        $newPost->image = $post->images->low_resolution->url;
        $newPost->added_at = Carbon::createFromTimestamp($post->created_time)->format("Y-m-d H:i:s");

        $newPost->save();

    }
}
