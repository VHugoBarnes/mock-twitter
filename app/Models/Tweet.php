<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $table = 'tweets';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'user_id',
        'content',
        'parent_tweet_id',
        'reply_to_tweet_id',
        'retweet_id',
        'is_public',
    ];
}
