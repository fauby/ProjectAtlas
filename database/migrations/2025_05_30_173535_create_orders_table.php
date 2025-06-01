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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('CartID')->constrained('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('TotalPrice', 10, 2);
            $table->string('DeliveryStatus');
            $table->string('PaymentStatus');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
