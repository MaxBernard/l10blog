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
            $table->bigInteger('author_id')->unsigned();
            // $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 128);
            $table->string('slug', 128);
            $table->mediumText('content');
            $table->integer('category');
            $table->integer('tag');
            $table->string('cover_image', 64);
            $table->boolean('public')->default(true);
            $table->integer('year');
            $table->integer('month');
            $table->datetime('published_at')->nullable();
            $table->index('title');
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
