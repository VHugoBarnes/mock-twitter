<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetMedia extends Model
{
    use HasFactory;

    protected $table = 'tweet_media';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'media_id',
    ];
    protected $connection = 'pgsql';
}
