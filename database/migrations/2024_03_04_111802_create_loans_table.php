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
        Schema::create('loans', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->BigInteger('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->BigInteger('item_id', false, true);
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->date('checkout_date');
            $table->date('due_date');
            $table->date('returned_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
