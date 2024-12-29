<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetMention extends Model
{
    use HasFactory;

    protected $table = 'tweet_mention';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'mention_id',
    ];
    protected $connection = 'pgsql';
}
