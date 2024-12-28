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
        Schema::create('tweet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->foreignId('parent_tweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->foreignId('reply_to_tweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->foreignId('retweet_id')->nullable()->constrained('tweets')->onDelete('cascade');
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweet');
    }
};
