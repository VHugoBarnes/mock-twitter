<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetReport extends Model
{
    use HasFactory;

    protected $table = 'tweet_report';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'user_id',
        'reason',
    ];
    protected $connection = 'pgsql';
}
