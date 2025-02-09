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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Ensure this column exists
            $table->json('image')->nullable(); // Change from string to JSON
            $table->unsignedBigInteger('news_id')->nullable(); // Reference to the related data
            $table->unsignedBigInteger('notices_id')->nullable(); // Reference to the related data
            $table->unsignedBigInteger('messages_id')->nullable(); // Reference to the related data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
