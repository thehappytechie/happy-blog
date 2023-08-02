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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('contents')->nullable();
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade')->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_draft')->default(0);
            $table->date('published_at')->nullable();
            $table->string('user_id')->nullable();
            $table->string('feature_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
