<?php

namespace App\Console\Commands;

use App\TwitterFeed;
use Illuminate\Console\Command;
use Thujohn\Twitter\Facades\Twitter;

class GetTwitterFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill database with latest tweet from user';

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
     * Send API request and save the latest tweet to database, if it doesn't exist yet
     *
     * @return mixed
     */
    public function handle()
    {
        //use Twitter package
        $results = Twitter::getUserTimeline(['screen_name' => 'spurs', 'count' => 1, 'format' => 'object']);

        $tweet = $results[0];
        $uid = $tweet->id;

        if (! TwitterFeed::where('uid', '=', $uid)->exists()) {
            TwitterFeed::storeNewTweet($tweet);
        }
    }
}
