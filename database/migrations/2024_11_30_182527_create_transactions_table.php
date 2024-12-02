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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->constrained(
                table: 'users',
                indexName: 'transactions_buyer_id'
            );
            $table->foreignId('product_id')->constrained(
                table: 'products',
                indexName: 'transactions_product_id'
            );
            $table->integer('quantity');
            $table->enum('status', ['Pending', 'In Process', 'Failed', 'Finished'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
