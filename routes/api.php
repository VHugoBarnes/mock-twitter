<?php

use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    # For the moment, make a public route to create an API user
    Route::post('/api-user', [ApiUserController::class, 'created']);
});

# Make a 'api' group and add the 'ability:api:access' middleware
# So that only authenticated users with the 'api:access' ability can access the routes
Route::middleware(['ability:api:access'])->group(function () {
    Route::prefix('api')->group(function () {
        # Auth routes
        Route::prefix('auth')->group(function () {
            Route::post('/login', [AuthController::class, 'login']);
            Route::post('/register', [AuthController::class, 'register']);
        });

        # Tweet routes
        Route::prefix('tweet')->group(function () {
            Route::post('/', [TweetController::class, 'tweet']);
            Route::delete('/', [TweetController::class, 'delete']);
            Route::post('/like', [TweetController::class, 'like']);
            Route::delete('/unlike', [TweetController::class, 'unlike']);
            Route::post('/retweet', [TweetController::class, 'retweet']);
            Route::delete('/unretweet', [TweetController::class, 'unretweet']);
            Route::post('/reply', [TweetController::class, 'reply']);
            Route::get('/many', [TweetController::class, 'getTweets']);
            Route::get('/one', [TweetController::class, 'getTweet']);
            Route::get('/replies', [TweetController::class, 'getTweetReplies']);
            Route::get('/likes', [TweetController::class, 'getTweetLikes']);
            Route::get('/retweets', [TweetController::class, 'getTweetRetweets']);
            Route::get('/replies-count', [TweetController::class, 'getTweetRepliesCount']);
            Route::get('/likes-count', [TweetController::class, 'getTweetLikesCount']);
            Route::get('/retweets-count', [TweetController::class, 'getTweetRetweetsCount']);
            Route::post('/bookmark', [TweetController::class, 'bookmark']);
            Route::delete('/unbookmark', [TweetController::class, 'unbookmark']);
        });

        # Profile routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'profile']);
            Route::put('/', [ProfileController::class, 'updateProfile']);
        });
    });
});
