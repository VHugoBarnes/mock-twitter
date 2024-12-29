<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetPollOptions extends Model
{
    use HasFactory;

    protected $table = 'tweet_poll_options';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_poll_id',
        'option',
    ];
    protected $connection = 'pgsql';
}
