<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->foreignId('parent_tweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->foreignId('reply_to_tweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->foreignId('retweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });

        // Create Media Table to link tweet with media
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('type');
            $table->timestamps();
        });
        Schema::create('tweet_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('media_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Hashtag Table to link tweet with hashtags
        Schema::create('hashtags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('tweet_hashtag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('hashtag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Like Table to link tweet with likes
        Schema::create('tweet_like', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Retweet Table to link tweet with retweets
        Schema::create('tweet_retweet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Craete Bookmark Table to link tweet with bookmarks
        Schema::create('tweet_bookmark', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Mention Table to link tweet with mentions
        Schema::create('tweet_mention', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Poll Table to link tweet with polls
        Schema::create('tweet_polls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->timestamps();
        });

        // Create Poll Option Table to link tweet with poll options
        Schema::create('tweet_poll_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_poll_id')->constrained()->onDelete('cascade');
            $table->string('option');
            $table->timestamps();
        });

        // Create Poll Vote Table to link tweet with poll votes
        Schema::create('tweet_poll_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_poll_id')->constrained()->onDelete('cascade');
            $table->foreignId('tweet_poll_option_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Tweet Report Table to link tweet with reports
        Schema::create('tweet_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
        Schema::dropIfExists('tweet_media');
        Schema::dropIfExists('media');
        Schema::dropIfExists('tweet_hashtag');
        Schema::dropIfExists('hashtags');
        Schema::dropIfExists('tweet_like');
        Schema::dropIfExists('tweet_retweet');
        Schema::dropIfExists('tweet_bookmark');
        Schema::dropIfExists('tweet_mention');
        Schema::dropIfExists('tweet_polls');
        Schema::dropIfExists('tweet_poll_options');
        Schema::dropIfExists('tweet_poll_votes');
        Schema::dropIfExists('tweet_reports');
    }
};
