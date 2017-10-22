<?php

namespace App\Http\Controllers;

use App\Feed;

class FeedController extends Controller
{
    /**
     * Display recent tweet and instagram post, sorted by date.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //unique returns only 1 of each post_type
        $posts = Feed::orderBy('added_at', 'desc')->get()->unique('post_type');

        return view('index', compact('posts'));
    }
}
