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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedBigInteger('product_clothing_size_id');
            $table->foreign('product_clothing_size_id')->references('id')->on('product_clothing_sizes');

            $table->unsignedBigInteger('product_pant_size_id');
            $table->foreign('product_pant_size_id')->references('id')->on('product_pant_sizes');

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');

            $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};