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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_category_id')->constrained('package_categories')->onDelete('cascade');
            $table->string('package_name');
            $table->string('package_subtitle')->nullable();
            $table->integer('star_rating')->default(1);
            $table->decimal('price', 10, 2);
            $table->string('currency', 10)->default('BDT');
            $table->string('billing_period', 50)->default('Month');
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
