<?php

namespace App;

use Carbon\Carbon;

class TwitterFeed extends Feed
{
    /**
     * Store new twitter post
     * @param $tweet
     */
    public static function storeNewTweet($tweet)
    {
        $uid = $tweet->id;
        $name = $tweet->user->screen_name;
        $description = $tweet->text;

        $date = Carbon::parse($tweet->created_at)->format("Y-m-d H:i:s");

        TwitterFeed::create([
            'uid' => $uid,
            'username' => $name,
            'description' => $description,
            'post_type' => 1, //tw
            'added_at' => $date
        ]);
    }
}
