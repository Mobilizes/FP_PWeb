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
        Schema::create('transaction_seller', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained(
                table: 'transactions',
                indexName: 'transaction_seller_transaction_id'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('seller_id')->constrained(
                table: 'users',
                indexName: 'transaction_seller_seller_id'
            )->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_seller');
    }
};
