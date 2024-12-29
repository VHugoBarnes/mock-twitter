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
        // Create api_users table,
        // which is a table to store the users allowed to
        // access the API (nothing to do with the end-users)
        Schema::create('api_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('api_secret', 80)->unique()->nullable()->default(null);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('rate_limit')->default(60);
            $table->timestamp('last_access_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_users');
    }
};
