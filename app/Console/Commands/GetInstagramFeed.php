<?php

namespace App\Console\Commands;

use App\InstagramFeed;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class GetInstagramFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill database with latest instagram post from user';

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
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->get('https://www.instagram.com/spurs/media/')->getBody();
        $results = json_decode($response);
        $post = $results->items[0];

        $uid = $post->id;
        if (! InstagramFeed::where('uid', '=', $uid)->exists()) {
            InstagramFeed::storeNewPost($post);
        }
    }
}
