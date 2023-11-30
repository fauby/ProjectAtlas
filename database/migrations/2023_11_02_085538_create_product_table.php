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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('SellerID')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Title');
            $table->text('Description');
            $table->bigInteger('Price')->nullable();
            $table->foreignId('Category')->constrained('category')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Condition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
