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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_description');
            $table->integer('product_price');
            $table->string('product_brand');
            $table->string('product_color');
            $table->string('product_category');
            $table->integer('product_stocks');
            $table->string('product_thumbnail');
            $table->string('product_images');
            $table->json('product_tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
