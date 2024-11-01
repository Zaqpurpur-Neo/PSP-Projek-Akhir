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
        Schema::create('blog_post_model', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('slug');
            $table->string('image');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("blog_post_model");
    }
};
