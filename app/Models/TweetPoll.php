<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetPoll extends Model
{
    use HasFactory;

    protected $table = 'tweet_poll';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'question',
    ];
    protected $connection = 'pgsql';
}
