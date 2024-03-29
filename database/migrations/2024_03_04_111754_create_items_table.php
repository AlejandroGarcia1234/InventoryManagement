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
        Schema::create('items', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->unsignedBigInteger('box_id')->nullable();
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
