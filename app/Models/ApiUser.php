<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiUser extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'api_users';

    protected $fillable = [
        'name',
        'email',
        'api_token',
        'status',
        'rate_limit',
        'last_accessed_at',
    ];

    protected $hidden = [
        'api_token',
    ];

    protected $connection = 'pgsql';
}
