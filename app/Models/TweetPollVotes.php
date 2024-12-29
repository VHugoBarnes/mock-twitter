<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetPollVotes extends Model
{
    use HasFactory;

    protected $table = 'tweet_poll_votes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_poll_id',
        'tweet_poll_option_id',
        'user_id',
    ];
    protected $connection = 'pgsql';
}
