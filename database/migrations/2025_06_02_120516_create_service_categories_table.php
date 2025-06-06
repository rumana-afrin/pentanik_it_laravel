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
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->integer('sort_order')->default(0)->unsigned();
            $table->enum('status', ['featured', 'regular'])->default('regular')->comment('featured, regular');
            $table->boolean('is_active')->comment('true=1, false=0')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('service_categories');
        // Schema::enableForeignKeyConstraints();
    }
};
