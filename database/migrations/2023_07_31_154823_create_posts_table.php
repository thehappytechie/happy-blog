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
            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('contents')->nullable();
            $table->foreignUlid('category_id')
                ->constrained('categories')
                ->onDelete('cascade')->nullable();
            $table->boolean('is_archived')->default(0)->nullable();
            $table->boolean('is_draft')->default(0)->nullable();
            $table->date('published_at')->nullable();
            $table->foreignUlid('user_id')
                ->constrained('users')
                ->onDelete('cascade')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('views')->default(0);
            $table->softDeletes();
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
