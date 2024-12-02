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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained(
                table: 'users',
                indexName: 'donations_admin_id'
            );
            $table->foreignId('receiver_id')->constrained(
                table: 'users',
                indexName: 'donations_receiver_id'
            );
            $table->foreignId('freebie_id')->constrained(
                table: 'freebies',
                indexName: 'donations_freebie_id'
            );
            $table->integer('quantity');
            $table->enum('status', ['Pending', 'Accepted', 'Denied', 'In Process', 'Failed', 'Finished'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
