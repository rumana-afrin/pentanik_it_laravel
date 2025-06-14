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
        Schema::create('seo_meta_tags', function (Blueprint $table) {
            $table->id();
             $table->string('taggable_type'); // Model class name
            $table->unsignedBigInteger('taggable_id'); // Model ID
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('auther')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('twitter_card')->default('summary');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->text('twitter_site')->nullable();
            $table->string('twitter_image')->nullable();
            $table->timestamps();

            $table->index(['taggable_type', 'taggable_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_meta_tags');
    }
};
