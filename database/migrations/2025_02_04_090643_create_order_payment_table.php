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
        Schema::create('order_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->float("amount");
            $table->string('delivery_methods');
            $table->string('credential');
            $table->enum('status',['PENDING','APPROVED','PAID','REFUND','CANCEL','HOLD'])->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payment');
    }
};
