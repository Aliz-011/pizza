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
        Schema::create('product_items', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('price');
            $table->enum('size', ['small', 'medium', 'large']);
            $table->string('pizza_type');
            $table->foreignIdFor(\App\Models\Product::class)->references('id')->on('products')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
