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
        Schema::create('products_has_ingredients', function (Blueprint $table) {
            $table->ulid('product_id');
            $table->ulid('ingredient_id');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');

            $table->primary(['product_id', 'ingredient_id'], 'products_has_ingredients_product_id_ingredient_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_has_ingredients');
    }
};
