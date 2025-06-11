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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_content')->nullable();
            $table->longText('content');
            $table->string('template')->default('default');
            $table->string('featured_image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('show_in_menu')->default(false);
            $table->enum('menu_type', ['header', 'footer'])->nullable();
            $table->unsignedInteger('menu_order')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
