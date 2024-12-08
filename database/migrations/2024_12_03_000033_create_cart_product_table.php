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
        Schema::create('cart_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained(
                table: 'products',
                indexName: 'cart_product_product_id'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cart_id')->constrained(
                table: 'carts',
                indexName: 'cart_product_cart_id'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_product');
    }
};
