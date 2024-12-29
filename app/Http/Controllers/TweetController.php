<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function tweet(Request $request) {}

    public function delete(Request $request) {}

    public function like(Request $request) {}

    public function unlike(Request $request) {}

    public function retweet(Request $request) {}

    public function unretweet(Request $request) {}

    public function reply(Request $request) {}

    public function getTweets(Request $request) {}

    public function getTweet(Request $request) {}

    public function getTweetReplies(Request $request) {}

    public function getTweetLikes(Request $request) {}

    public function getTweetRetweets(Request $request) {}

    public function getTweetRepliesCount(Request $request) {}

    public function getTweetLikesCount(Request $request) {}

    public function getTweetRetweetsCount(Request $request) {}

    public function bookmark(Request $request) {}

    public function unbookmark(Request $request) {}
}
