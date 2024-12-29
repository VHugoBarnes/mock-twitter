<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'tweet_hashtag';
    protected $primaryKey = 'id';
    public $timestamps = true;
    # Fillable
    protected $fillable = [
        'tweet_id',
        'hashtag_id',
    ];
    protected $connection = 'pgsql';
}
