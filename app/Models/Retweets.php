<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retweets extends Model
{
    use HasFactory;

    protected $table = 'tweet_retweet';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'user_id',
    ];
    protected $connection = 'pgsql';
}
