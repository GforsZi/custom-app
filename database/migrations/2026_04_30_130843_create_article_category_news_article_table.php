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
        Schema::create('article_category_news_article', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_article_id');
            $table->unsignedBigInteger('article_category_id');
            $table->timestamps();
            $table->foreign('news_article_id')->references('id')->on('news_articles')->onDelete('cascade');
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_category_news_article');
    }
};
